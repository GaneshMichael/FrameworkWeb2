<?php

namespace TCG\Http;

interface ControllerInterface
{
    public function view();
    public function getModel();
    public function setModel(ModelInterface $model);
}