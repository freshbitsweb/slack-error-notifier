<?php

namespace Freshbitsweb\SlackErrorNotifier;

class RequestDataProcessor
{
    /**
     * Adds additional request data to the log message
     */
    public function __invoke($record)
    {
        $record['extra']['inputs'] = request()->except(config('slack_error_notifier.ignore_request_fields'));
        $record['extra']['headers'] = request()->header();
        $record['extra']['session'] = session()->all();

        return $record;
    }
}
