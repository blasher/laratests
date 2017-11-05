<?php

namespace Blasher\Laratest\Tests\API;

use App\Factory;
use App\User;
use Blasher\Laratest\ApiAuthenticatable;
use Blasher\Laratest\ApiAuthTestInterface as ApiAuthTestInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response as Response;
use Exception;
use Route;
use Schema;
use Tests\TestCase;

class ApiTokenAuthTest extends TestCase implements ApiAuthTestInterface
{
    use ApiAuthenticatable;
    use RefreshDatabase;

    // PROPERTIES
    
    protected $apiUser;
    protected $apiRoutes;

    /**
     * Check for results when authenticated
     *
     * @param  Illuminate\Routing\Route $route
     */
    public function getsJsonForAuthenticatedRoute( $route )
    {
        $user = $this->createApiUser();
        $route_uri = $route->uri().'?api_token='.$user->api_token;
        
        $response = $this->actingAs($user)
                         ->get( $route->uri())
                         ->assertStatus( Response::HTTP_OK )
                         ->seeJson( [] );
    }
    
    /**
     * create authenticated api user
     *
     * @return User
     */
    public function createApiUser()
    {
        $this->user = factory(User::class)->create();
        $this->user->save();

        $user = User::findOrFail(1);
        
        $this->assertEquals($this->user->name(), $user->name() );

        return $user;
    }

}
