<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if ($item->is_published)
                    Pusblish
                @else
                    Draft
                @endif
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#maindata" class="nav-link active" data-toggle="tab" role="tab">Main</a>
                    </li>
                    <li class="nav-item">
                        <a href="#adddata" data-toggle="tab" role="tab" class="nav-link">NoMain</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" value=" {{ $item->title }} "
                            name="title"
                            id="title"
                            class="form-control"
                            minlength="3"
                            required>
                        </div>
                        <div class="form-group">
                            <label for="content_raw">Article</label>
                            <textarea name="content_raw"
                            class="form-control"
                            rows="10">{{ old('contnet_raw', $item->content_raw) }}
                            </textarea>
                        </div>
                    </div>
                    <div class="tab-pane" id="adddata" role="tabpanel">
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id"
                                id="category_id"
                                class="form-control"
                                aria-placeholder="Select category"
                                required>
                                @foreach ($categoryList as $categoryOption)
                                    <option value=" {{$categoryOption->id}} "
                                    @if ($categoryOption->id == $item->category_id) selected @endif>
                                    {{ $categoryOption->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input  name="slug" value=" {{$item->slug}} "
                                    type="text"
                                    id="slug"
                                    class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="except">Short txt</label>
                            <textarea   name="except"
                                        id="except"
                                        class="form-control"
                                        rows="3"> {{ old('excerpt', $item->excerpt) }} </textarea>
                        </div>
                        <div class="form-check">
                            <input  type="hidden"
                                    name="is_published"
                                    value="0">

                            <input  name="is_published"
                                    type="checkbox"
                                    class="form-check-input"
                                    value="1"
                                @if ($item->is_published)
                                    checked="checked"
                                @endif
                            >
                            <label for="is_published" class="form-check-label">Published</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
