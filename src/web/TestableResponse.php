<?php

namespace markhuot\craftpest\web;

use markhuot\craftpest\behaviors\TestableResponseBehavior;
use markhuot\craftpest\dom\NodeList;
use Symfony\Component\DomCrawler\Crawler;

/**
 * @mixin TestableResponseBehavior
 */
class TestableResponse extends \craft\web\Response
{
    public function behaviors(): array
    {
        return [TestableResponseBehavior::class];
    }

    public function send()
    {
        // This page intentionally left blank so we can inspect the response body without it
        // being prematurely written to the screen
    }

    public function expect() {
        return test()->expect($this);
    }

    // public function __isset($key) {
    //     if (parent::__isset($key)) {
    //         return true;
    //     }
    //
    //     return $this->querySelector($key)->count() > 0;
    // }


    /**
     * Make prepare() publicly accessible
     */
    public function prepare(): void
    {
        parent::prepare();
    }
}
