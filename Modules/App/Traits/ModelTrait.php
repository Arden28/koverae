<?php

namespace Moules\App\Traits;

trait ModelTrait{
    public static function createOrUpdate($data, $id = null)
    {
        if ($id) {
            // If ID is provided, update the existing record
            $model = self::findOrFail($id);
            $model->update($data);
        } else {
            // If no ID, create a new record
            $model = self::create($data);
        }

        return $model;
    }
}
