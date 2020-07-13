<?php

abstract class FormHandler {
    const CREATE_TASK = 'create-task';
    const UPDATE_TASK = 'update-task';
    const CREATE_COMMENT = 'create-comment';

    public static function init(string $flag_str)
    {
        switch ($flag_str) {
            case self::CREATE_TASK:
                return new CreateTaskHandler();
            case self::UPDATE_TASK:
                return new UpdateTaskHandler();
            case self::CREATE_COMMENT:
                return new CreateCommentHandler();
        }
    }

    abstract public function handleForm();
}
