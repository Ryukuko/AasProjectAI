<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;
use App\Validation\RulesControllerValidation;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
        CreditCardRules::class,
        RulesControllerValidation::class
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];
    public $authregister = [
        'username' =>'required|string|is_unique[user.username]|min_length[3]|max_length[35]',
        'password' =>'required|string|min_length[8]|max_length[35]',
        'confirm_password' =>'required|string|matches[password]|min_length[8]|max_length[35]',
    ];

    public $gantiPassword = [
        'password' =>'required|string|min_length[8]|max_length[35]',
        'confirm_password' =>'required|string|matches[password]|min_length[8]|max_length[35]',
    ];
    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

}
