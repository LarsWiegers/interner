<?php

namespace App\States\Internship;


class PendingInternshipState extends InternshipState {

    public function colour(): string
    {
        return 'orange';
    }
}
