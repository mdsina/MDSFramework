<?php
/**
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

namespace Framework\Session;


class SessionManager {

    /**
     * @var \SessionHandlerInterface
     */
    private $_sessionHandler;
    private $_hashFunction = null;


    protected function __construct(array $params = [])
    {
        if (empty($params)) {
            $this->_sessionHandler = new FileSessionHandler();

            return $this;
        }
    }

    /**
     * Set session handler
     *
     * @param \SessionHandlerInterface $handler
     */
    public function setHandler(\SessionHandlerInterface $handler)
    {
        $this->_sessionHandler = $handler;
    }


    /**
     * Get session handler
     *
     * @return \SessionHandlerInterface
     */
    public function getHandler()
    {
        return $this->_sessionHandler;
    }



} 