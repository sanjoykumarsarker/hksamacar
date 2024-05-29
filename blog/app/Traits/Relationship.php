<?php

namespace App\Traits;

trait Relationship
{

    private function getSelfModel()
    {
        $class = substr(strrchr(__CLASS__, "\\"), 1);
        $name = file_exists("../Models/$class") ? $class : $class . "Model";
        return "\App\Models\\$name";
    }

    // private $related_model = '';

    public function with($relatedModel, $select = null, array $options = [])
    {
        helper('inflector');
        $model = new $relatedModel;
        // $self = new $this->getSelfModel();
        $self = $this;
        $table = isset($options) && array_key_exists('table', $options) ? $options['table'] : $model->table;
        $prefix = isset($options) && array_key_exists('prefix', $options) ? $options['prefix'] : ($table . '_');
        $foreign_key = isset($options) && array_key_exists('foreign_key', $options) ? $options['foreign_key'] : (singular($table) . '_id');
        $owner_key = isset($options) && array_key_exists('foreign_key', $options) ? $options['foreign_key'] : $self->primaryKey;

        $select_query = '';
        if (isset($select) && is_array($select)) {
            $select_array = [];
            foreach ($select as $value) {
                if (is_array($value)) {
                    $name = current($value);
                    $key = key($value);
                    $select_array[] = "$table.$key as $name";
                } else {
                    $as = $prefix . $value;
                    $select_array[] = "$table.$value as $as";
                }
            }
            $select_query = implode(', ', $select_array);
        } else {
            $select_query = "$table.*";
        }
        $self->select($select_query);
        $self->join($table, "$table.$owner_key=$table.$foreign_key");
        // join('users', 'users.id=posts.user_id')
        return $self;
    }

    private function belongsTo($modelName, array $options = [])
    {
        helper('inflector');
        // $this->related_model = $modelName;
        $model = new $modelName;
        $self = new $this->getSelfModel();

        $singular_table = singular($model->table);
        $foreign_key = isset($options) && array_key_exists('foreign_key', $options) ? $options['foreign_key'] : ($singular_table . '_id');
        $owner_key = $self->primaryKey;

        return $model->asObject()->where($owner_key, $this->{$foreign_key})->find();
    }

    // private function buildResult()
    // {

    // }
}
