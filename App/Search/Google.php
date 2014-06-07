<?php
/**
 * Search by Google AJAX API
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */


/**
 * Class App_Search_Google
 *
 * It's not good idea for using, because we can do it on client side without server side
 * TO-DO: remove from release
 */
class App_Search_Google extends App_Search_Api
{

    // Using Google Search AJAX API, because we can make unlimited query for it
    protected $_url = 'http://ajax.googleapis.com/ajax/services/search/';


    /**
     * @param string $query
     * @param int $count - count of result records
     * @param int $start - start search position
     * @param string $rubric - search rubric (web, video ...)
     * @return array
     */
    public function getResults($query = '', $count = 8, $start = 0, $rubric = 'web')
    {
        $count = (int) $count;
        $start = (int) $start;

        if (empty($query) || $count == 0) {
            return array();
        }

        $query = str_replace(' ', '+', $query);

        $queryUrl = $this->_url . $rubric . '?v=1.0&q=' . $query . '&start=' . $start;
        $result = array();

        // by default we can get 4 records, but we can get more records per request by rsz[0-8]
        if ($count <= 8)
        {
            $queryUrl .= '&rsz=' . $count;
            $body = file_get_contents($queryUrl);
            $json = json_decode($body);

            foreach ($json->responseData->results as $resultJson) {
                $resultGoogle['url'] = $resultJson->url;
                $resultGoogle['title'] = $resultJson->title;
                $resultGoogle['content'] = $resultJson->content;

                $result[] = $resultGoogle;
            }

            return $result;
        }

        // get full iteration's count
        $iterations = floor($count/8);
        $secondStart = 0;

        for ($i = 0; $i < $iterations; $i++) {
            $result = array_merge($result, $this->getResults($query, 8, $secondStart));
            $secondStart += 8;
        }

        // get last records
        $iterations = $count - $iterations * 8;
        $result = array_merge($result, $this->getResults($query, $iterations, $secondStart));

        return $result;
    }
}