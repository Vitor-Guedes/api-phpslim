<?php

namespace Api\Middleware;

class ApiResponse
{
    public function __invoke($request, $handler)
    {
        $response = $handler->handle($request);
        
        return $response->withHeader(
            'Content-Type',
            'application/json'
        );
    }
}