<?php

trait ModelCounterCache {
    /**
     * Updates the counter caches, can optionally specify to only update some
     * @param  array $only only update specified counters
     * @return void
     */
    public function updateCounters(array $only = null) {
        if(isset($this->counter_cache) && is_array($this->counter_cache)) {
            $update = is_null($only) ? array_keys($this->counter_cache) : $only;
            
            // Cycle through each model to update the counter for
            // Relationships should be either "hasOne" or "belongsToMany"
            foreach($update as $model) {
                $count = $this->$model()->count();
                $field = "cache_" . $model . "_count";
                $this->$field = $count;
            }
        }
    }

    public function getChildCount(string $child_model) {
        $field = "cache_" . $child_model . "_count";

        try {
            return $this->$field;
        } catch(Exception $e) {
            return $this->$model()->count();
        }
    }
}