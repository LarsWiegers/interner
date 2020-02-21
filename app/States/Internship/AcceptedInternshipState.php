<?php

namespace App\States\Internship;


class AcceptedInternshipState extends InternshipState {

    public function colour(): string
    {
        return 'green';
    }
}
