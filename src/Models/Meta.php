<?php

namespace Pixelpeter\Genderize\Models;

use Carbon\Carbon;

class Meta extends BaseModel
{
    protected $code;
    protected $limit;
    protected $remaining;
    protected $reset;

    /**
     * Create new instance of Meta model
     *
     * @param $data
     */
    public function __construct($data)
    {
        $headers = array_change_key_case($data->headers, CASE_LOWER);

        $this->code = (int)$data->code;
        $this->limit = (int)$headers['x-rate-limit-limit'];
        $this->remaining = (int)$headers['x-rate-limit-remaining'];
        $this->reset = $this->setDate($headers['x-rate-limit-reset']);
    }

    /**
     * Set remaining seconds till reset as Carbon instance
     *
     * @param $data
     */
    protected function setDate($data)
    {
        $date = Carbon::now();
        return $date->addSeconds($data);
    }
}
