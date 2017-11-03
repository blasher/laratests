<?php

namespace Blasher\Laratest\Tests\API;

use Blasher\Laratest\Tests\API\ApiAuthenticatable;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response as Response;

class ApiPassportAuthTest extends TestCase implements ApiAuthTestInterface
{
    use ApiAuthenticatable;
    use RefreshDatabase;

    // PROPERTIES
    
    protected $apiUser;
    protected $apiRoutes;

    protected $validResponseForUnauthenticated = [
        Response::HTTP_FOUND,             // 302
        Response::HTTP_UNAUTHORIZED,      // 401
    ];
    
    protected $HttpRequestMethods = [
        'get',
        'post',
        'put',
        'delete',
        // 'patch',
        // 'head',
        // 'options',
        // 'connect',
        
    ];

   
}
