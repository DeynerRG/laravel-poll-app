<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;

class CreatePoll extends Component
{

    #[Validate('required|min:3|max:255', as: 'poll title',)]
    public string $title = '';
    
    #[Validate([
        'options'=>'required|array|min:1|max:10',
        'options.*'=>'required|min:3|max:255',
    ], message: [
        'options.required'=>'Enter at least 1 option',
        'options.*.required'=>'This option can\'t be empty'        
    ], attribute: [
        'options.*'=>'option'
    ])]
    public array $options = ['', ''];

   
    public function addOption()
    {
        $this->options = [...$this->options, ''];
    }

    public function removeOption(int $optionToRemove)
    {
        unset($this->options[$optionToRemove]);
        $this->options = array_values($this->options);
    }

    public function resetFields()
    {
        $this->reset(['title','options']);
    }

    public function createPoll()
    {
        $this->validate(); #automaticamente toma las reglas de validacion de 'rules'
        Poll::create(['title'=>$this->title])
            ->options()
                ->createMany(
                    collect($this->options)
                    ->map(fn($option)=>['name'=>$option])
                    ->all()
                );

        
        $this->resetFields();
        $this->dispatch('poll-created')->to(Polls::class); # emite un evento a un componente especifico
    }

    public function render()
    {
        return view('livewire.create-poll');
    }

}
