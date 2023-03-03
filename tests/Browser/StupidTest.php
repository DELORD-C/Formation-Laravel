<?php

namespace Tests\Browser;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class StupidTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $postNumber = Post::count();
        $this->browse(function (Browser $browser) use ($postNumber) {
            $browser->loginAs(User::find(1))
                    ->visit('/post')
                    ->click('table > tbody > tr:nth-child(1) button')
                    ->assertDontSee('table > tbody > tr:nth-child(' . $postNumber . ')');
        });
    }
}
