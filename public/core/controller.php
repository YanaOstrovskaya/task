<?php

namespace Core;

use Models\TaskModel;
use Models\AttachmentModel;
use Models\TypeModel;
use Models\PriorityModel;

class Controller
{
    public function __construct()
    {
        $this->typeModel = new TypeModel();
        $this->taskModel = new TaskModel();
        $this->priorityModel = new PriorityModel();
        $this->attachmentModel = new AttachmentModel();
    }
}
