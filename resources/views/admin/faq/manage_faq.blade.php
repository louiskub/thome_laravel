@extends('component.layout_admin')

@section('content')
    <link rel="stylesheet" href="/css/admin/manage_articles.css">
    <link rel="stylesheet" href="/css/admin/manage_faq.css">
    <link rel="stylesheet" href="/css/component/tag_selector.css">
    <div class="container">
        <header>
            <h1>คำถามที่พบบ่อย</h1>
        </header>

        <div class="search-filter-container">
            <div class="search-box">
                <input type="text" id="search" placeholder="ค้นหาคำถาม...">
                <span class="search-icon">🔍</span>
            </div>
            <div class="filter-box">
                <label for="articles-filter">กรองตามแท็ก:</label>
                <select name="filter" id="articles-filter">
                    <option value="all">ทั้งหมด</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag['id'] }}">{{ $tag->translation->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <section class="articles-section">
            <div class="table-container">
                <div class="table-header">
                    <h2>จัดการคำถามที่พบบ่อย</h2>
                    <div>
                        <a id="add-tag" class="btn btn-outline-success border">เพิ่มtag</a>
                        <button id="add-article" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">เพิ่มคำถามที่พบบ่อย</button>
                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th class="col-2">ชื่อคำถาม</th>
                                <th class="col-6">คำตอบ</th>
                                <th class="col-1">แท็ก</th>
                                <th class="col-1">การจัดการ</th>
                            </tr>
                        </thead>
                        <tbody id="articles-list">
                            <!-- จะถูกเติมด้วย JavaScript -->
                            @foreach ($faqs as $faq)
                                <tr data-id="{{ $faq->id }}"
                                    data-th-q="{{ $faq->th->question }}"
                                    data-th-ans="{{ $faq->th->answer }}"
                                    data-en-q="{{ $faq->en->question }}"
                                    data-en-ans="{{ $faq->en->answer }}">
                                    <td>
                                        {{ $faq->id }}
                                    </td>
                                    <td>
                                        {{ $faq->translation->question }}
                                    </td>
                                    <td>
                                        {{ $faq->translation->answer }}
                                    </td>
                                    <td>
                                        @foreach ($faq['tags'] as $tag)
                                            <span class="tag" tag-id="{{ $tag->faq_tag_id }}">{{ $tag->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="actions-buttons">
                                        <button class="btn btn-edit" data-id="{{ $faq['id'] }}" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            แก้ไข
                                        </button>
                                        <button class="btn btn-danger delete-article"
                                            data-id="{{ $faq['id'] }}">ลบ</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($faqs->isEmpty())
                    <div id="no-results" class="no-results">ไม่พบบทความที่ตรงกับการค้นหา</div>
                @endif
                {{ $faqs->links('vendor.pagination.default') }}
            </div>
        </section>

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">สร้างคำถามใหม่</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="question">คำถาม</label>
                            <input type="text" id="question" class="form-control mb-2" placeholder="กรุณากรอกคำถาม">
                            <label for="question">คำถาม (อังกฤษ)</label>
                            <input type="text" id="question-eng" class="form-control"
                                placeholder="Please enter the question">
                        </div>
                        <div class="form-group mb-3">
                            <label for="ans">คำตอบ</label>
                            <textarea type="text" id="ans" class="form-control mb-2" placeholder="กรุณากรอกคำตอบ"></textarea>
                            <label for="ans">คำตอบ (อังกฤษ)</label>
                            <textarea type="text" id="ans-eng" class="form-control" placeholder="Please enter the answer"></textarea>
                        </div>
                        <div id="tag-selector-container" data-mode="create"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="button" class="btn btn-primary submit" data-bs-dismiss="modal">สร้าง</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/admin/faq/manage_faq.js" type="module"></script>
    <script>
        const jj = @json($faqs);
        console.log(jj);
    </script>
@endsection
