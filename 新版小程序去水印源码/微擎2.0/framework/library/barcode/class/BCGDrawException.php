<?php
/**
 *--------------------------------------------------------------------
 *
 * Draw Exception
 *
 *--------------------------------------------------------------------
 * Copyright (C) Jean-Sebastien Goupil
 * 5 G �� Դ �� �� �� ��
 */
class BCGDrawException extends Exception {
    /**
     * Constructor with specific message.
     *
     * @param string $message
     */
    public function __construct($message) {
        parent::__construct($message, 30000);
    }
}
?>