<?php

namespace Api\Controller;

use Api\Model\{Customer as Model, Clause};

class Customer
{
    public function getOne($request, $response, $args)
    {
        $query = $request->getQueryParams();

        try {
            if (isset($args['id'])) {
                $customer = new Model();
                if ($query) {
                    $_clause = new Clause();
                    $_clause->setModel($customer);
                    $_clause->handle($query);
                    $customer = $_clause->getModel()
                        ->where('id', $args['id'])->get();
                } else {
                    $customer = Model::find($args['id']);
                }
    
                $payload = json_encode($customer);
    
                $response->getBody()->write($payload);
                return $response->withStatus(200);
            }
        } catch (\Exception $e) {
            return $this->handleException($e, $response);
        }

        return $response->withStatus(404);
    }

    public function get($request, $response, $args)
    {
        $payload = $customers = [];
        $query = $request->getQueryParams();

        try {
            if ($query) {
                $customers = $query;
                $customer = new Model();

                $_clause = new Clause();
                $_clause->setModel($customer);
                $_clause->handle($query);
                $customer = $_clause->getModel();
    
                $customers = [
                    'params' => $_clause->getParams(),
                    'result' => $customer->get()
                ];
            } else {
                $customers = Model::all();
            }
            
            $payload = json_encode($customers);
            $response->getBody()->write($payload);
            return $response->withStatus(200);
        } catch (\Exception $e) {
            return $this->handleException($e, $response);
        }
    }

    public function store($request, $response)
    {
        $data = $request->getParsedBody();
        $httpCode = 201;

        if (empty($data)) {
            return $response->withStatus(400);
        }

        try {
            Model::create($data);
            return $response->withStatus($httpCode);
        } catch (\Exception $e) {
            return $this->handleException($e, $response);
        }
    }

    public function update($request, $response, $args)
    {
        $data = $request->getParsedBody();
        $id = $args['id'];
        $httpCode = 200;
        try {
            $success = Model::where(['id' => $id])
                ->update($data);

            $payload = json_encode([
                'success' => (bool) $success
            ]);
            $response->getBody()->write($payload);
        } catch (\Exception $e) {
            $response = $this->handleException($e, $response);
            $httpCode = 500;
        }
        
        return $response->withStatus($httpCode);
    }

    public function delete($request, $response, $args)
    {
        $id = $args['id'];
        $httpCode = 200;
        try {
            $customer = Model::find($id);
            $success = $customer->forceDelete();

            $payload = json_encode([
                'success' => $success
            ]);
            $response->getBody()->write($payload);
        } catch (\Exception $e) {
            $response = $this->handleException($e, $response);
        }
        
        return $response->withStatus($httpCode);
    }

    protected function handleException($e, $response)
    {
        $httpCode = $e->getCode() < 400 ? 500 : $e->getCode();
        $payload = [
            'Error' => $e->getMessage(),
            'Error-Code' => $e->getCode()
        ];

        if ($e->getCode() == 23000) {
            $payload = [
                'Error:' => 'Email ja esta sendo usado.'
            ];
            $httpCode = 409;
        }

        if ($e->getCode() == '42S22') {
            $payload = [
                'Error:' => 'Um dos campos, não pode ser encontrado.'  
            ];
        }

        $payload = json_encode($payload);
        $response->getBody()->write($payload);
        return $response->withStatus($httpCode);;
    }
}