<?php

abstract class AbstractMediaObject extends Eloquent {
    /**
     * Gets the shelf (location) of the media object.
     * @return Shelf
     */
    public function shelf() {
        return $this->belongsTo('shelf');
    }

    /**
     * Moved a MediaObject to a new, specified shelf.
     * @param  int    $new_shelf_id the ID of the shelf to be moved to
     * @return void
     */
    public function moveToShelf(int $new_shelf_id) {
        try {
            // Check if the new shelf exists
            $shelf = Shelf::findOrFail($new_shelf_id);
            $this->shelf()->associate($shelf);
        } catch(ModelNotFoundException $e) {
            // Warn the user that the shelf they are trying to move to doesn't exist
        } // don't do anything else if there is an error
    }

    /**
     * Gets the reference code for this media object.
     * @return string the reference code
     */
    public abstract function getReferenceCode();
}
