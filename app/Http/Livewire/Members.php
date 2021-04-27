<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Member;

class Members extends Component

{
    public $members, $name, $email, $phone_number, $status, $k3_awal, $k3_akhir, $member_id;
    public $isModal;

    public function render()
    {
        $this->members = Member::orderBy('created_at', 'DESC')->get();
        return view('livewire.members');
    }

    public function create()
    {
        $this->resetFields();

        $this->openModal();
    }

    public function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone_number = '';
        $this->k3_awal = '';
        $this->k3_akhir = '';
        $this->status = '';
        $this->member_id = '';
    }

    public function openModal()
    {
        $this->isModal = true;
    }

    public function closeModal()
    {
        $this->isModal = false;
    }
    public function  store()
    {

        $this->validate(
            [
                'name' => 'required|string',
                'email' => 'required|email|unique:members,email,' . $this->member_id,
                'phone_number' => 'required|numeric',
                'k3_awal' => 'required|numeric',
                'k3_akhir' => 'required|numeric',
                'status' => 'required'
            ]
        );

        Member::updateOrCreate(
            ['id' => $this->member_id],
            [
                'name' => $this->name,
                'email' => $this->email,
                'phone_number' => $this->phone_number,
                'k3_awal' => $this->k3_awal,
                'k3_akhir' => $this->k3_akhir,
                'status' => $this->status
            ]
        );

        session()->flash('message', $this->member_id ? $this->name . ' Diperbaharui' : $this->name . ' Ditambahakan');
        $this->closeModal();
        $this->resetFields();
    }

    public function  edit($id)
    {

        $member = Member::find($id);
        $this->member_id = $id;
        $this->name = $member->name;
        $this->email = $member->email;
        $this->phone_number = $member->phone_number;
        $this->k3_awal = $member->k3_awal;
        $this->k3_akhir = $member->k3_akhir;
        $this->status = $member->status;

        $this->openModal();
    }

    public function delete($id)
    {
        $member = Member::find($id);
        $member->delete();
        \session()->flash('message', $member->name . ' Dihapus');
    }
}