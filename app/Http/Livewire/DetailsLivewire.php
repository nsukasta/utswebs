<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Member;
use App\Models\Meteran;


class DetailsLivewire extends Component
{

    public $members, $name, $email, $phone_number, $status,$k3_awal, $k3_akhir, $k3_awals, $k3_akhirs, $member_id;
    public $isModal, $isModals, $tanggal, $id_user;


    public function render()

    {
        return view('livewire.details-livewire');
    }

    public function mount($id)
    {
        $this->detailContent($id);
    }


    public function detailContent($id)
    {
        $member = Member::find($id);
        $this->member_id = $id;
        $this->name = $member->name;
        $this->email = $member->email;
        $this->phone_number = $member->phone_number;
        $this->k3_awal = $member->k3_awal;
        $this->k3_akhir = $member->k3_akhir;
        $this->status = $member->status;
    }

    public function create()
    {
        $this->resetFields();
        $this->openModal();
    }

    
    public function createK3()
    {

     $this->bukaModal();
    }


public function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone_number = '';
    }

    public function resetIsi()
    {
        $this->user_id='';
        $this->k3_awal = '';
        $this->k3_akhir = '';
      
    }

    public function  editNPE($member_id)
    {
        $member = Member::find($member_id);
        $this->name = $member->name;
        $this->email = $member->email;
        $this->phone_number = $member->phone_number;

        $this->openModal();
    }

    public function  editK3($member_id)
    {
        $member = Meteran::find($member_id);
        $this->k3_awal = $meteran->k3_awals;
        $this->k3_akhir = $meteran->k3_akhirs;
        $this->tanggal = $meteran->tanggals;
        $this->openModal();
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
    }
    
    public function  storeK3()
    {

        $this->validate(
            [
                // 'name' => 'required|string',
                // 'email' => 'required|email|unique:members,email,' . $this->member_id,
                // 'phone_number' => 'required|numeric',
                'k3_awals' => 'required|numeric',
                'k3_akhirs' => 'required|numeric',
                'tanggal' => 'required'
            ]
        );

        Meteran::updateOrCreate(
            
            ['id_user' => $this->member_id],
            [
                // 'name' => $this->name,
                // 'email' => $this->email,
                // 'phone_number' => $this->phone_number,
                
                'k3_awals' => $this->k3_awals,
                'k3_akhirs' => $this->k3_akhirs,
                'tanggal' => $this->tanggal
            ]
        );
        
        session()->flash('message', $this->member_id ? $this->name . ' Diperbaharui' : $this->name . ' Ditambahakan');
        $this->tutupModal();
    }


    public function openModal()
    {
        $this->isModal = true;
    }

    public function closeModal()
    {
        $this->isModal = false;
    }

    public function delete($member_id)
    {
        $member = Member::find($member_id);
        
        $member->delete();

        return redirect()->to('/member');

        \session()->flash('message', $member->name . ' Dihapus');
    }


    public function bukaModal()
    {
        $this->isModals = true;
    }

    public function tutupModal()
    {
        $this->isModals = false;
    }

}