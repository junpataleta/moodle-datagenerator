<?php

define('CLI_SCRIPT', true);

if (isset($_SERVER['REMOTE_ADDR'])) {
    exit(1);
}

require(dirname(__FILE__) . '/config.php');
require_once($CFG->libdir . '/clilib.php');
require_once($CFG->libdir . '/adminlib.php');
require_once($CFG->dirroot . '/course/lib.php');
require_once($CFG->libdir . '/testing/generator/data_generator.php');
require_once($CFG->dirroot . '/calendar/tests/helpers.php');

$DOMAIN = "example.com.au";

$users = [
    [
        'firstname' => 'Adam',
        'lastname' => 'Ant',
    ],
    [
        'firstname' => 'Bert',
        'lastname' => 'Bee',
    ],
    [
        'firstname' => 'Colin',
        'lastname' => 'Carter',
    ],
    [
        'firstname' => 'Diane',
        'lastname' => 'Denver',
    ],
    [
        'firstname' => 'Emily',
        'lastname' => 'Echo',
    ],
    [
        'firstname' => 'Fred',
        'lastname' => 'Ford',
    ],
    [
        'firstname' => 'Gemma',
        'lastname' => 'Gannoway',
    ],
    [
        'firstname' => 'Hannah',
        'lastname' => 'Henderson',
    ],
    [
        'firstname' => 'Indianna',
        'lastname' => 'Ibis',
    ],
    [
        'firstname' => 'James',
        'lastname' => 'Jackoughby',
    ],
    [
        'firstname' => 'Kenneth',
        'lastname' => 'Kamber',
    ],
    [
        'firstname' => 'Lauren',
        'lastname' => 'Little',
    ],
    [
        'firstname' => 'Mary',
        'lastname' => 'Maverley',
    ],
    [
        'firstname' => 'Niamh',
        'lastname' => 'Nimble',
    ],
    [
        'firstname' => 'Oscar',
        'lastname' => 'Ostlethwaite',
    ],
    [
        'firstname' => 'Penny',
        'lastname' => 'Pemberton',
    ],
    [
        'firstname' => 'Queenie',
        'lastname' => 'Quip',
    ],
    [
        'firstname' => 'Rodney',
        'lastname' => 'Rover',
    ],
    [
        'firstname' => 'Sally',
        'lastname' => 'Simpson',
    ],
    [
        'firstname' => 'Trevor',
        'lastname' => 'Turnbull',
    ],
    [
        'firstname' => 'Una',
        'lastname' => 'Umber',
    ],
    [
        'firstname' => 'Victor',
        'lastname' => 'Venenerton',
    ],
    [
        'firstname' => 'William',
        'lastname' => 'Wordsworth',
    ],
    [
        'firstname' => 'Xanthia',
        'lastname' => 'Xim',
    ],
    [
        'firstname' => 'Yarloo',
        'lastname' => 'Yawley',
    ],
    [
        'firstname' => 'Zain',
        'lastname' => 'Zacks',
    ],
];

$categories = [
    [
        'name' => 'Students Union',
        'idnumber' => 'su',
        'enrolments' => [
            'manager' => [
                'zain',
            ],
        ],
        'events' => [
            [
                'name' => 'Fresher\'s Faire',
                'timestartmodifier' => 'P1WT8H',
                'timeduration' => HOURSECS * 8,
            ],
        ],
        'children' => [
        ],
        'courses' => [
            [
                'fullname' => 'Cinema',
                'shortname' => 'Cinema',
                'idnumber' => 'su-cinema',
                'description' => '<p>Home of the student cinema</p>',
                'enrolments' => [
                    'editingteacher' => [
                        'una',
                    ],
                    'student' => [
                        'rodney',
                        'xanthia',
                        'niamh',
                        'oscar',
                    ],
                ],
                'events' => [
                    [
                        'name' => 'Film Showing',
                        'timestartmodifier' => 'P1DT21H',
                        'timeduration' => HOURSECS * 2.5,
                        'repeats' => 10,
                    ],
                    [
                        'name' => 'Film Showing',
                        'timestartmodifier' => 'P3DT21H',
                        'timeduration' => HOURSECS * 2.5,
                        'repeats' => 10,
                    ],
                    [
                        'name' => 'Film Showing',
                        'timestartmodifier' => 'P5DT21H',
                        'timeduration' => HOURSECS * 2.5,
                        'repeats' => 10,
                    ],
                ],
            ],
            [
                'fullname' => 'Music Society',
                'shortname' => 'Music',
                'idnumber' => 'su-music',
                'description' => '<p>See the calendar for details of our practices</p>',
                'enrolments' => [
                    'editingteacher' => [
                        'penny',
                        'rodney',
                    ],
                    'student' => [
                        'sally',
                        'una',
                        'yarloo',
                        'diane',
                        'kenneth',
                    ],
                ],
                'events' => [
                    [
                        'name' => 'Big Band Rehearsal',
                        'timestartmodifier' => 'P1DT18H30M',
                        'timeduration' => HOURSECS * 2,
                        'repeats' => 10,
                    ],
                    [
                        'name' => 'Choir Rehearsal',
                        'timestartmodifier' => 'P2DT18H',
                        'timeduration' => HOURSECS * 2,
                        'repeats' => 10,
                    ],
                    [
                        'name' => 'Orchestra rehearsal',
                        'timestartmodifier' => 'P4DT19H',
                        'timeduration' => HOURSECS * 2.5,
                        'repeats' => 10,
                    ],
                    [
                        'name' => 'Mid term Concer',
                        'timestartmodifier' => 'P5WT18H30M',
                        'timeduration' => HOURSECS * 4,
                    ],
                    [
                        'name' => 'End of term Concert',
                        'timestartmodifier' => 'P10WT18H30M',
                        'timeduration' => HOURSECS * 4,
                    ],
                ],
            ],
            [
                'fullname' => 'Hiking Club',
                'shortname' => 'Hiking',
                'idnumber' => 'su-hike',
                'description' => '<p>We Hike to the pub every day ending in Y</p>',
                'enrolments' => [
                    'editingteacher' => [
                        'victor',
                    ],
                    'student' => [
                        'queenie',
                        'sally',
                        'william',
                    ],
                ],
                'events' => [
                    [
                        'name' => 'Clougha',
                        'timestartmodifier' => 'P4DT9H',
                        'timeduration' => HOURSECS * 6,
                    ],
                    [
                        'name' => 'Hellvellyn',
                        'timestartmodifier' => 'P1W4DT9H',
                        'timeduration' => HOURSECS * 6,
                    ],
                    [
                        'name' => 'The Old Man',
                        'timestartmodifier' => 'P2W4DT9H',
                        'timeduration' => HOURSECS * 6,
                    ],
                ],
            ],
        ],
    ],
    [
        'name' => '2017-2018',
        'idnumber' => '000118',
        'enrolments' => [
            'manager' => [
                'adam',
            ],
        ],
        'children' => [
            [
                'name' => 'Faculty of Science and Technology',
                'idnumber' => '000118-fst',
                'enrolments' => [
                    'manager' => [
                        'bert',
                    ],
                ],
                'events' => [
                     [
                         'name' => 'Faculty Induction',
                         'description' => '<p>A chance to meet the faculty staff</p>',
                         'timemodifier' => 'P1DT17H30M',
                     ],
                ],
                'children' => [
                    [
                        'name' => 'Chemistry',
                        'idnumber' => '000118-000141',
                        'enrolments' => [
                            'manager' => [
                                'colin',
                            ],
                        ],
                        'events' => [
                            [
                                'name' => 'Lab Safety Awareness course',
                                'description' => '<p>Every student must attent a lab safety awareneess course this week.</p><p>Attendance is compulsory and will be monitored.</p><p>You will not be allowed to use lab equipment without attending this course.</p>',
                                'timemodifier' => 'PT9H',
                            ],
                            [
                                'name' => 'Lab Safety Awareness course',
                                'description' => '<p>Every student must attent a lab safety awareneess course this week.</p><p>Attendance is compulsory and will be monitored.</p><p>You will not be allowed to use lab equipment without attending this course.</p>',
                                'timemodifier' => 'PT14H',
                            ],
                            [
                                'name' => 'Lab Safety Awareness course',
                                'description' => '<p>Every student must attent a lab safety awareneess course this week.</p><p>Attendance is compulsory and will be monitored.</p><p>You will not be allowed to use lab equipment without attending this course.</p>',
                                'timemodifier' => 'P1DT9H',
                            ],
                            [
                                'name' => 'Lab Safety Awareness course',
                                'description' => '<p>Every student must attent a lab safety awareneess course this week.</p><p>Attendance is compulsory and will be monitored.</p><p>You will not be allowed to use lab equipment without attending this course.</p>',
                                'timemodifier' => 'P1DT14H',
                            ],
                            [
                                'name' => 'Lab Safety Awareness course',
                                'description' => '<p>Every student must attent a lab safety awareneess course this week.</p><p>Attendance is compulsory and will be monitored.</p><p>You will not be allowed to use lab equipment without attending this course.</p>',
                                'timemodifier' => 'P3DT9H',
                            ],
                            [
                                'name' => 'Lab Safety Awareness course',
                                'description' => '<p>Every student must attent a lab safety awareneess course this week.</p><p>Attendance is compulsory and will be monitored.</p><p>You will not be allowed to use lab equipment without attending this course.</p>',
                                'timemodifier' => 'P3DT14H',
                            ],
                        ],
                        'children' => [
                        ],
                        'courses' => [
                            [
                                'fullname' => 'CHEM101: Atoms and Molecules',
                                'shortname' => 'CHEM101',
                                'idnumber' => '000118-001667',
                                'description' => '<p>Atoms and Molecules</p>',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                    ],
                                    'student' => [
                                        'penny',
                                        'rodney',
                                        'trevor',
                                        'una',
                                    ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM102: Organic Structure',
                                'shortname' => 'CHEM102',
                                'idnumber' => '000118-001663',
                                'description' => '<p>Organic Strucure</p>',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                        'emily',
                                    ],
                                    'student' => [
                                        'penny',
                                        'trevor',
                                        'una',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Phsyics',
                        'idnumber' => '000118-000035',
                        'enrolments' => [
                            'manager' => [
                                'fred',
                            ],
                        ],
                        'children' => [
                        ],
                        'courses' => [
                            [
                                'fullname' => 'PHYS101: The Physical Universe',
                                'shortname' => 'PHYS101',
                                'idnumber' => '000118-001701',
                                'description' => '<p>The Physical Univerise</p>',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'gemma',
                                        'hannah',
                                    ],
                                    'student' => [
                                        'rodney',
                                        'trevor',
                                        'victor',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'PHYS102: Classical Mechanics',
                                'shortname' => 'PHYS102',
                                'idnumber' => '000118-001702',
                                'description' => '<p>Classical Mechanics</p>',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'hannah',
                                    ],
                                    'student' => [
                                        'rodney',
                                        'trevor',
                                        'victor',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Faculty of Arts and Social Sciences',
                'idnumber' => '000118-fass',
                'enrolments' => [
                    'manager' => [
                        'indianna',
                    ],
                ],
                'children' => [
                    [
                        'name' => 'History',
                        'idnumber' => '000118-000021',
                        'enrolments' => [
                            'manager' => [
                                'james',
                            ],
                        ],
                        'children' => [
                        ],
                        'courses' => [
                            [
                                'fullname' => 'HIST100: From Ancient to Modern: History and Historians',
                                'shortname' => 'HIST100',
                                'idnumber' => '000118-015173',
                                'description' => '<p>From Ancient to Modern: History and Historians</p>',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'kenneth',
                                    ],
                                    'student' => [
                                        'queenie',
                                        'sally',
                                        'william',
                                        'xanthia',
                                        'yarloo',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'HIST101: The Fall of Rome',
                                'shortname' => 'HIST101',
                                'idnumber' => '000118-018723',
                                'description' => '<p>The Fall of Rome</p>',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'lauren',
                                    ],
                                    'student' => [
                                        'queenie',
                                        'sally',
                                        'william',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Politics, Philosophy and Religion',
                        'idnumber' => '000118-000243',
                        'enrolments' => [
                            'manager' => [
                                'mary',
                            ],
                        ],
                        'events' => [
                            [
                                'name' => 'PPR Welcome from the Dean',
                                'timestartmodifier' => 'P3DT15H',
                                'timeduration' => MINSECS * 15,
                            ],
                        ],
                        'children' => [
                        ],
                        'courses' => [
                            [
                                'fullname' => 'POLI100: Politics and International Relations in the Contemporary World',
                                'shortname' => 'POLI100',
                                'idnumber' => '000118-008549',
                                'description' => '<p>Politics and International Relations in the Contemporary World</p>',
                                'events' => [
                                    [
                                        'name' => 'POLI100 Lecture Series',
                                        'timestartmodifier' => 'P4DT12H',
                                        'timeduration' => HOURSECS,
                                        'repeats' => 8,
                                    ],
                                    [
                                        'name' => 'POLI100 Exam',
                                        'timestartmodifier' => 'P9W4DT11H',
                                        'timeduration' => 2 * HOURSECS,
                                    ],
                                ],
                                'enrolments' => [
                                    'editingteacher' => [
                                        'niamh',
                                    ],
                                    'student' => [
                                        'penny',
                                        'queenie',
                                        'sally',
                                        'william',
                                        'xanthia',
                                        'yarloo',
                                        'una',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'PHIL100: Introduction to Philosophy',
                                'shortname' => 'PHIL100',
                                'idnumber' => '000118-002163',
                                'description' => '<p>Introduction to Philosophy</p>',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'oscar',
                                    ],
                                    'student' => [
                                        'penny',
                                        'queenie',
                                        'sally',
                                        'william',
                                        'xanthia',
                                        'yarloo',
                                        'victor',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];

$transaction = $DB->start_delegated_transaction();

$generator = new test_data_generator();

$generator->create_users($users);
$generator->setup_courses($categories);

//$transaction->allow_commit();

class test_data_generator {

    public $users = [];
    public $courses = [];
    public $categories = [];
    public $roles = [];
    protected $adminuser = null;

    public function __construct() {
        global $DB;

        $this->roles = $DB->get_records('role', [], '', 'shortname, id');
        $this->adminuser = \core_user::get_user_by_username('admin');
    }

    public function create_users($users) {
        foreach ($users as $user) {
            $this->create_user($user);
        }
    }

    public function setup_courses($data) {
        foreach ($data as $category) {
            $this->create_category($category);
        }
    }

    protected function create_category($category, $parent = null) {
        // Process the current category.
        $record = (object) $category;

        if (!empty($parent)) {
            $record->parent = $parent->id;
        }

        $generator = new testing_data_generator();
        $thiscategory = $generator->create_category($record);
        if ($parent) {
            error_log("==> Created category '{$thiscategory->name}' in '{$parent->name}'");
        } else {
            error_log("==> Created category '{$thiscategory->name}' in root");
        }

        $this->categories[$thiscategory->idnumber] = $thiscategory;

        // Now add any child categories.
        foreach ($category['children'] as $child) {
            $this->create_category($child, $thiscategory);
        }

        // Now add any courses directly in this category.
        if (isset($category['courses'])) {
            foreach ($category['courses'] as $course) {
                $this->create_course($course, $thiscategory);
            }
        }

        // Now add any events directly in this category.
        if (isset($category['events'])) {
            foreach ($category['events'] as $event) {
                $event['category'] = $thiscategory;
                $this->create_event($event);
            }
        }

        // Finally enrol any users who should be there.
        if (isset($category['enrolments'])) {
            foreach ($category['enrolments'] as $rolename => $users) {
                foreach ($users as $username) {
                    $this->assign_category_role($thiscategory, $username, $rolename);
                }
            }
        }

        return $thiscategory;
    }

    protected function create_course($course, $category) {
        $record = (object) $course;

        $record->category = $category->id;

        $generator = new testing_data_generator();
        $thiscourse = $generator->create_course($record);
        $this->courses[$thiscourse->idnumber] = $thiscourse;
        error_log("==> Created course '{$thiscourse->shortname}' in '{$category->name}'");

        // Finally enrol any users who should be there.
        if (isset($course['enrolments'])) {
            foreach ($course['enrolments'] as $rolename => $users) {
                foreach ($users as $username) {
                    $this->assign_course_role($thiscourse, $username, $rolename);
                }
            }
        }

        // Now add any events directly in this category.
        if (isset($course['events'])) {
            foreach ($course['events'] as $event) {
                $event['course'] = $thiscourse;
                $this->create_event($event);
            }
        }

        return $thiscourse;
    }

    protected function create_user($user) {
        global $DOMAIN;

        $record = (object) $user;
        $username = strtolower($record->firstname);
        $record->username  = $username;
        $record->idnumber = $record->username;
        $record->email = "{$username}@{$DOMAIN}";;
        $record->password = 'x';

        $generator = new testing_data_generator();
        $thisuser = $generator->create_user($record);
        $this->users[$username] = $thisuser;

        $thisuser = $this->users[$username];

        // Now add any events directly in this category.
        if (isset($user['events'])) {
            foreach ($user['events'] as $event) {
                $event['user'] = $thisuser;
                $this->create_event($event);
            }
        }
    }

    protected function assign_category_role($category, string $username, string $rolename) {
        $generator = new testing_data_generator();

        $roleid = $this->roles[$rolename]->id;
        $user = $this->users[$username];
        $userid = $user->id;
        $context = \context_coursecat::instance($category->id);
        $contextid = $context->id;

        $generator->role_assign($roleid, $userid, $contextid);
        error_log("==> Assigned role '{$rolename}' ({$roleid}) to '{$user->username}' in '{$category->name}'");
    }

    protected function assign_course_role($course, string $username, string $rolename) {
        $generator = new testing_data_generator();

        $roleid = $this->roles[$rolename]->id;
        $user = $this->users[$username];
        $userid = $user->id;

        $generator->enrol_user($userid, $course->id, $roleid);
        error_log("==> Enrolled user '{$user->username}' as a '{$rolename}' ({$roleid}) in '{$course->shortname}'");

    }

    protected function create_event($event) {
        $properties = [
            'name' => 'Event',
            'description' => '',
            'descriptionformat' => FORMAT_HTML,
            'eventtype' => 'site',
            'repeat' => 0,
            'repeats' => 0,
            'timestart' => time(),
            'timeduration' => 0,
            'timesort' => 0,
            'type'  => CALENDAR_EVENT_TYPE_STANDARD,
        ];

        $event = (object) $event;

        $record = (object) [];
        foreach ($properties as $property => $default) {
            if (isset($event->$property)) {
                $record->$property = $event->$property;
            } else {
                $record->$property = $default;
            }
        }

        if (isset($event->timestartmodifier)) {
            $time = new \DateTime(usergetmidnight(time()));
            $time->add(new \DateInterval($event->timestartmodifier));
            $record->timestart = $time->format('U');
        }

        if (isset($event->category)) {
            $record->eventtype = 'category';
            $record->categoryid = $event->category->id;
        }

        if (isset($event->course)) {
            $record->eventtype = 'course';
            $record->courseid = $event->course->id;
        }

        if (isset($event->username)) {
            $record->eventtype = 'user';
            $user = $this->users[$username];
            $record->userid = $user->id;
        }

        if (empty($record->userid)) {
            $record->userid = $this->adminuser->id;;
        }

        \calendar_event::create($record, false);
    }
}