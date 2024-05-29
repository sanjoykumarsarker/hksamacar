<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Auth;
use App\Models\EpaperModel;
use App\Models\Media;

class EpaperController extends BaseController
{
    public function index()
    {
        $epaperModel = new EpaperModel();
        $issue = trim($this->request->getGet('issue'));
        $epaperModel = $epaperModel->active();
        if ($issue) {
            $epaper = $epaperModel
                ->orderBy('epapers.id', 'desc')
                ->where('issue_no', $issue)
                ->first();
        } else {
            $epaper = $epaperModel
                ->orderBy('epapers.id', 'desc')
                ->first();
        }

        $papers = $epaperModel
            ->active()
            ->select('issue_no,issue')
            ->orderBy('epapers.id', 'desc')
            ->paginate(12);
        $pager = $epaperModel->pager;

        // ->select('epapers.*,media.id as md_id, media.name as md_name,media.alt as md_alt,media.location as md_location')
        // ->join('media', 'media.group=epapers.issue_no')

        $mediaModel = new Media();
        $mediaModel = $mediaModel->select('name,alt');

        if ($epaper->type == 'image') {
            $media = $mediaModel->where('group', $epaper->issue_no)->find();
        } else {
            $media = $mediaModel->find($epaper->media_id);
        }

        $epaper->media = $media;
        // dd($epaper);
        // $data = new stdClass;
        // foreach ($epapers as $index => $item) {
        //     $media = [];
        //     foreach ($item as $key => $value) {
        //         $keys = explode('_', $key);
        //         if ($keys[0] === 'md') {
        //             $media[$keys[1]] = $value;
        //         } else {
        //             if ($index === 0 && $value) $data->{$key} = $value;
        //         }
        //     }
        //     $data->media[] = (object) $media;
        // }

        return view('epaper/index', compact('epaper', 'papers', 'pager'));
    }

    public function manage()
    {
        $q = trim($this->request->getGet('q'));
        $model = new EpaperModel();
        if ($q) {
            $model = $model->like('issue', $q)
                ->orLike('issue_no', $q);
        }

        $epapers = $model->orderBy('id', 'desc')
            ->paginate(20);
        $pager = $model->pager;
        return view('admin/epaper/index', compact('epapers', 'pager'));
    }

    public function toggle($id)
    {
        $model = new EpaperModel();
        $paper = $model->find($id);
        if (!$paper) return redirect()->back()->with('msg', 'PAGE not found!');
        $model->update($id, ['active' => !$paper->active]);
        return redirect()->back()->with('msg', 'Status Updated Successfully!');
    }

    public function new()
    {
        helper(['form', 'input']);
        return view('admin/epaper/new');
    }

    public function edit($id)
    {
        helper(['form', 'input']);
        $epaper = model('EpaperModel')->find($id);
        // $mediaModel = new Media();
        $mediaModel = model('Media')->select('name,alt');

        if ($epaper->type == 'image') {
            $media = $mediaModel->where('group', $epaper->issue_no)->find();
        } else {
            $media = $mediaModel->find($epaper->media_id);
        }

        $epaper->media = $media;
        return view('admin/epaper/edit', compact('epaper'));
    }

    public function save()
    {
        $rules = [
            'issue' => 'required',
            'issue_no' => 'required|numeric|is_unique[epapers.issue_no]',
            'type' => 'required|in_list[pdf,image]',
            'created_at' => 'permit_empty|valid_date'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'issue' => $this->request->getPost('issue'),
            'issue_no' => $this->request->getPost('issue_no'),
            'type' => $this->request->getPost('type'),
            'body' => $this->request->getPost('body'),
            'created_at' => $this->request->getPost('created_at'),
            'active' =>  $this->request->getPost('active', FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
        ];
        $model = new EpaperModel();

        if ($data['type'] === 'pdf') {
            $pdf = $this->request->getFile('pdf');
            if ($pdf->isValid()) {
                $name = $pdf->getRandomName();
                $media = model('Media')->insert([
                    'user_id' => Auth::id(),
                    'location' => $model->pdfLocation,
                    'name' => $name,
                    'alt' => $data['issue'],
                    'type' => $pdf->getMimeType(),
                ]);
                $pdf->move($model->pdfLocation, $name);
                $data['media_id'] = $media;
            }
        } elseif ($data['type'] === 'image') {
            $images = $this->request->getFileMultiple('image');
            $mediaArray = [];
            foreach ($images as $image) {
                if ($image->isValid()) {
                    $filename = pathinfo($image->getClientName(), PATHINFO_FILENAME);
                    $name = $data['issue_no'] . "-$filename." . $image->guessExtension();
                    $mediaArray[] = [
                        'user_id' => Auth::id(),
                        'name' => $name,
                        'group' => $data['issue_no'],
                        'alt' => $data['issue'] . ' ' . $data['issue_no'],
                        'location' => $model->imageLocation,
                        'type' => $image->getMimeType(),
                    ];
                    $image->move($model->imageLocation, $name);
                    // $data['media_id'] = $media;
                }
            }
            model('Media')->insertBatch($mediaArray);
        }


        $model->insert($data);
        return redirect()->back()->with('msg', 'Status Updated Successfully!');
    }

    public function update($id)
    {
        $rules = [
            'issue' => 'required',
            'issue_no' => "required|numeric|is_unique[epapers.issue_no,id,$id]",
            'type' => 'required|in_list[pdf,image]',
            'created_at' => 'permit_empty|valid_date'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id' => $id,
            'issue' => $this->request->getPost('issue'),
            'type' => $this->request->getPost('type'),
            'body' => $this->request->getPost('body'),
            'active' =>  $this->request->getPost('active', FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
        ];

        $model = new EpaperModel();
        $model->update($data);

        return redirect()->back()->with('msg', 'Status Updated Successfully!');
    }
}
