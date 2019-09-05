<?php
namespace App\Rules;
use App\Rules\Password\DoesNotContainName;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use App\Rules\Password\DoesNotContainReservedWords;
use App\Rules\Password\ContainsNumberAndLetters;
use App\Rules\Password\DoesNotContainSequence;
use App\Rules\Password\DoesNotContainBirthdate;
use App\Rules\Password\DoesNotContainCpf;
use App\Rules\Password\DoesNotContainRG;
use App\Rules\Password\DoesNotContainPhone;
use App\Rules\Password\DoesNotContainCellphone;
use App\Rules\Password\DoesNotContainCode;

class PasswordRule implements Rule
{

    protected $request;

    protected $messages;

    protected $inspections = [
            DoesNotContainName::class,
            DoesNotContainReservedWords::class,
            ContainsNumberAndLetters::class,
            DoesNotContainSequence::class,
            DoesNotContainBirthdate::class,
            DoesNotContainCpf::class,
            DoesNotContainRG::class,
            DoesNotContainPhone::class,
            DoesNotContainCellphone::class,
            DoesNotContainCode::class
    ];

    public function __construct (Request $request)
    {
        $this->request = $request;
        
        $this->messages = collect([]);
    }

    public function passes ($attribute, $value)
    {
        foreach ($this->inspections as $inspection) {
            $inspection = app($inspection);
            
            $inspection->inspect($this->request->all(), $value);
            
            if ( $inspection->fails() ) {
                $this->messages->push($inspection->message());
            }
        }
        
        return $this->messages->isEmpty();
    }

    public function message ()
    {        
        return $this->messages->all();
    }
}
