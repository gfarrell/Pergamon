<?php

class Shelf extends Eloquent {
    use ModelCounterCache;

    protected $counter_cache = array(
        'objects'
    );

    public function objects(string $type = "all") {
        // TODO: need to use a polymorphic relationship to get different MediaObjects
    }
}