<?php

namespace App\Http\Controllers;

use App\Models\Leadership;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display the about page with all sections: About School, Mission & Vision, Leadership.
     */
    public function index()
    {
        $leadershipTeam = $this->getLeadershipTeam();
        return view('public.about', compact('leadershipTeam'));
    }

    /**
     * Display the mission & vision page (standalone, for direct linking).
     */
    public function missionVision()
    {
        return view('public.mission-vision');
    }

    /**
     * Display the leadership page (standalone, for direct linking).
     */
    public function leadership()
    {
        $leadershipTeam = $this->getLeadershipTeam();
        return view('public.leadership', compact('leadershipTeam'));
    }

    /**
     * Get leadership team from DB, falling back to demo data if empty.
     */
    private function getLeadershipTeam()
    {
        $team = Leadership::ordered()->get();

        if ($team->isEmpty()) {
            return collect([
                [
                    'name' => 'Principal Doe',
                    'position' => 'Principal',
                    'photo' => null,
                    'bio' => 'Leading Kamrieng High School with over 20 years of experience in education administration.',
                ],
                [
                    'name' => 'Vice Principal A',
                    'position' => 'Vice Principal',
                    'photo' => null,
                    'bio' => 'Oversees academic programs, curriculum development, and teacher professional development.',
                ],
                [
                    'name' => 'Mr. B',
                    'position' => 'Head of Academic Affairs',
                    'photo' => null,
                    'bio' => 'Responsible for curriculum planning, examination coordination, and academic standards.',
                ],
                [
                    'name' => 'Ms. C',
                    'position' => 'Head of Student Affairs',
                    'photo' => null,
                    'bio' => 'Manages student welfare, discipline, extracurricular programs, and counseling services.',
                ],
                [
                    'name' => 'Mr. D',
                    'position' => 'Head of Administration',
                    'photo' => null,
                    'bio' => 'Oversees school operations, facilities management, and administrative support.',
                ],
                [
                    'name' => 'Ms. E',
                    'position' => 'Head of Science Department',
                    'photo' => null,
                    'bio' => 'Leads the science faculty, coordinates laboratory activities, and promotes STEM education.',
                ],
            ]);
        }

        return $team;
    }
}
