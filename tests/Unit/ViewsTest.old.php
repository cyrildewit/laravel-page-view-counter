<?php

declare(strict_types=1);

/*
 * This file is part of the Eloquent Viewable package.
 *
 * (c) Cyril de Wit <github@cyrildewit.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CyrildeWit\EloquentViewable\Tests\Unit;

use CyrildeWit\EloquentViewable\View;
use CyrildeWit\EloquentViewable\Views;
use CyrildeWit\EloquentViewable\Tests\TestCase;
use CyrildeWit\EloquentViewable\Tests\TestHelper;
use CyrildeWit\EloquentViewable\Tests\Stubs\Models\Post;

/**
 * Class ViewsTest.
 *
 * @author Cyril de Wit <github@cyrildewit.nl>
 */
class ViewsTestOld extends TestCase
{
    /** @test */
    public function getViewsByType_can_return_views_from_model_instance()
    {
        $post = factory(Post::class)->create();

        $post->addView();
        $post->addView();
        $post->addView();

        $this->assertEquals(3, Views::getViewsByType($post));
    }

    /** @test */
    public function getViewsByType_can_return_views_from_namespace()
    {
        $post = factory(Post::class)->create();

        $post->addView();
        $post->addView();
        $post->addView();

        $this->assertEquals(3, Views::getViewsByType(Post::class));
    }

    /** @test */
    public function getUniqueViewsByType_can_return_views_from_model_instance()
    {
        $post = factory(Post::class)->create();

        TestHelper::createNewView($post, ['visitor' => 'visitor_one']);
        TestHelper::createNewView($post, ['visitor' => 'visitor_one']);

        $this->assertEquals(1, Views::getUniqueViewsByType($post));
    }

    /** @test */
    public function getUniqueViewsByType_can_return_views_from_namespace()
    {
        $post = factory(Post::class)->create();

        TestHelper::createNewView($post, ['visitor' => 'visitor_one']);
        TestHelper::createNewView($post, ['visitor' => 'visitor_one']);

        $this->assertEquals(1, Views::getUniqueViewsByType(Post::class));
    }
}
