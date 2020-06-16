<?php
/**
 *--------------------------------------------------------------------
 *
 * Argument Exception
 *
 *--------------------------------------------------------------------
 * Copyright (C) Jean-Sebastien Goupil
 * 5 G �� Դ �� �� �� ��
 */
class BCGArgumentException extends Exception {
    protected $param;

    /**
     * Constructor with specific message for a parameter.
     *
     * @param string $message
     * @param string $param
     */
    public function __construct($message, $param) {
        $this->param = $param;
        parent::__construct($message, 20000);
    }
}
?>