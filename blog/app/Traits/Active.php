<?php

namespace App\Traits;

trait Active
{
    public function active()
    {
        $this->builder()->where($this->table . '.active', 1);
        return $this;
    }

    public function toggle($id, $active)
    {
        // $page = $pageModel->find($id);
        // if(is_array($this))
        // if (!$page) return redirect()->back()->with('msg', 'PAGE not found!');
        return $this->update($id, ['active' => !$active]);
        // $sql = $this->table . '.active = !' . $this->table . '.active';
        // $rawSql = new \CodeIgniter\Database\RawSql($sql);
        // $this->builder()->set()->update();
        // return redirect()->back()->with('msg', 'Status Updated Successfully!');
    }
}
