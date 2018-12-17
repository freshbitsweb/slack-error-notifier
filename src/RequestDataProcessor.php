<?php

namespace Freshbitsweb\SlackErrorNotifier;

class RequestDataProcessor
{
    /**
     * Adds additional request data to the log message
     */
    public function __invoke($record)
    {
        $record['extra']['environment'] = config('app.env');

        if (config('slack_error_notifier.add_input_data')) {
            $record['extra']['inputs'] = request()->except(config('slack_error_notifier.ignore_request_fields'));
        }

        if (config('slack_error_notifier.add_request_headers')) {
            $record['extra']['headers'] = request()->header();
        }

        if (config('slack_error_notifier.add_session_data')) {
            $record['extra']['session'] = session()->all();
        }

        return $record;
    }
}
