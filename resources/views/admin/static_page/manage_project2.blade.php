@extends('layouts.layout_admin')

@section('content')
    <link rel="stylesheet" href="/css/admin/article/manage.css">
    <link rel="stylesheet" href="/css/admin/faq/manage.css">
    <style>
        .modal-content {
            top: 10%;
        }
    </style>
    <div class="container">
        <header>
            <h1>จัดการหน้า {{ $pageName }}</h1>
        </header>

        <div class="search-filter-container">
            <div class="search-box">
                <input type="text" id="search" placeholder="ค้นหาคำถาม...">
                <span class="search-icon">🔍</span>
            </div>
        </div>

        <section class="articles-section">
            <div class="table-container">
                <div class="table-header">
                    <h2>จัดการโปรเจค</h2>
                    <a href="#" class="btn btn-secondary" data-bs-toggle="modal"
                        data-bs-target="#createBackdrop">เพิ่มโปรเจค</a>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col-2">ภาพหน้าปก</th>
                                <th class="col-3">หัวข้อ</th>
                                <th class="col-5">รายละเอียด</th>
                                <th class="col-2">การจัดการ</th>
                            </tr>
                        </thead>
                        <tbody id="articles-list">
                            @foreach ($projects as $project)
                                <tr de-id="{{ $project->id }}">
                                    <td>{{ $project->coverPageImg }}</td>
                                    <td>{{ $project->translation->title }}</td>
                                    <td>{{ $project->translation->detail }}</td>
                                    <td>
                                        <a href="#a" class="btn btn-primary" btn-type="edit" data-bs-toggle="modal"
                                            data-bs-target="#editBackdrop">เพิ่มภาษา</a>
                                        <a href="#a" class="btn btn-primary" btn-type="edit" data-bs-toggle="modal"
                                            data-bs-target="#editBackdrop">แก้ไขข้อความ</a>
                                        <a href="#a" class="btn btn-primary" btn-type="edit" data-bs-toggle="modal"
                                            data-bs-target="#editBackdrop">แก้ไขรูป</a>
                                        <form action="/admin/static_page/project/{{ $pageName }}/{{ $project->id }}"
                                            style="display:inline;" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('ต้องการลบใช่ไหม');">ลบ</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <div class="modal fade" id="createBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="createBackdropLabel" aria-hidden="true">
            <form action="/admin/static_page/project/{{ $pageName }}" method="POST">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="createBackdropLabel">สร้างโปรเจคใหม่</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label>รูปภาพหน้าปก 16:9</label>
                                <input type="file" accept="image/*" name="coverPageImg" class="form-control mb-2"
                                    placeholder="" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>ชื่อผลงาน</label>
                                <input type="text" name="title" class="form-control mb-2"
                                    placeholder="กรุณากรอกชื่อผลงาน" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>รายละเอียด</label>
                                <input type="text" name="title" class="form-control mb-2"
                                    placeholder="กรุณากรอกรายละเอียด" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>รูปภาพที่เกี่ยวข้อง</label>
                                <input type="file" accept="image/*" name="title" class="form-control mb-2"
                                    placeholder="" required type="relate-images">
                            </div>
                            <div class="form-group mb-3">
                                <label for="relate-images">รูปภาพที่เกี่ยวข้อง</label>
                                <div class="relate-images">
                                    <!-- Images will be displayed here -->

                                </div>
                                <div>
                                    <label class="btn btn-outline-secondary" for="inputFile">
                                        <span class="fa fa-plus"></span>
                                        <span>เพิ่มรูปภาพ</span>
                                        <input id="inputFile" class="file-upload multiple-upload" type="file"
                                            accept="image/*" style="display: none;" />
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                            <button type="submit" class="btn btn-primary submit" data-bs-dismiss="modal">สร้าง</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script></script>
    <script src="/js/admin/project/manage.js"></script>
@endsection
