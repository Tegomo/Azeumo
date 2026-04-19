@extends('admin.layout')
@section('title', 'Modifier — '.$post->title_fr)

@push('head')
<style>
  .ck.ck-editor { border: 1px solid #c3c4c7!important; border-radius: 3px!important; }
  .ck.ck-editor__top .ck-sticky-panel .ck-toolbar {
    background: #f6f7f7!important;
    border-bottom: 1px solid #c3c4c7!important;
    border-radius: 3px 3px 0 0!important;
    padding: 4px 6px!important;
  }
  .ck.ck-editor__main .ck-editor__editable {
    min-height: 300px; font-size: 14px; line-height: 1.7; color: #1d2327;
    border: none!important; border-radius: 0 0 3px 3px!important;
    padding: 12px 16px!important; box-shadow: none!important;
  }
  .ck-editor-label {
    font-size: 11px; font-weight: 600; text-transform: uppercase;
    letter-spacing: .06em; color: #646970;
    padding: 5px 10px; background: #f0f0f1;
    border-bottom: 1px solid #c3c4c7;
    display: flex; align-items: center; gap: 6px;
  }
  .ck-editor-wrapper {
    border: 1px solid #c3c4c7; border-radius: 3px;
    overflow: hidden; margin-bottom: 16px;
  }
  .ck-editor-wrapper .ck.ck-editor { border: none!important; border-radius: 0!important; }
  .ck-editor-wrapper .ck.ck-editor__top .ck-sticky-panel .ck-toolbar { border-radius: 0!important; }
</style>
@endpush

@section('content')

<div class="title-area">
  <h1 class="wp-heading-inline">Modifier l'article</h1>
  <a href="{{ route('admin.posts.index') }}" class="button" style="margin-left:8px;">← Retour</a>
  <a href="{{ url('/blog/'.$post->slug) }}" target="_blank" class="button" style="margin-left:4px;">↗ Voir</a>
</div>

<form method="POST" action="{{ route('admin.posts.update', $post) }}" id="post-form" enctype="multipart/form-data">
@csrf @method('PUT')

<div id="poststuff">
  <!-- MAIN COLUMN -->
  <div id="post-body">

    <!-- Titre FR -->
    <div class="postbox">
      <div class="postbox-header" style="border-bottom:none;padding-bottom:0;">
        <h2 style="font-size:13px;color:#646970;font-weight:400;">Titre français</h2>
      </div>
      <div class="inside" style="padding-top:0;">
        <input type="text" id="title" name="title_fr"
          value="{{ old('title_fr', $post->title_fr) }}"
          placeholder="Saisir le titre en français…" required />
      </div>
    </div>

    <!-- Titre EN -->
    <div class="postbox">
      <div class="postbox-header" style="border-bottom:none;padding-bottom:0;">
        <h2 style="font-size:13px;color:#646970;font-weight:400;">Titre anglais</h2>
      </div>
      <div class="inside" style="padding-top:0;">
        <input type="text" name="title_en"
          value="{{ old('title_en', $post->title_en) }}"
          placeholder="Enter the English title…" required
          style="width:100%;padding:12px 14px;font-size:22px;font-weight:400;border:1px solid #c3c4c7;border-radius:3px;color:#1d2327;outline:none;line-height:1.4;" />
      </div>
    </div>

    <!-- Extrait -->
    <div class="postbox">
      <div class="postbox-header"><h2>Extrait (résumé)</h2></div>
      <div class="inside">
        <div style="margin-bottom:12px;">
          <div class="ck-editor-wrapper">
            <div class="ck-editor-label">🇫🇷 Extrait français</div>
            <div id="editor-excerpt-fr"></div>
          </div>
          <textarea name="excerpt_fr" id="textarea-excerpt-fr" style="display:none;">{{ old('excerpt_fr', $post->excerpt_fr) }}</textarea>
        </div>
        <div>
          <div class="ck-editor-wrapper">
            <div class="ck-editor-label">🇬🇧 English excerpt</div>
            <div id="editor-excerpt-en"></div>
          </div>
          <textarea name="excerpt_en" id="textarea-excerpt-en" style="display:none;">{{ old('excerpt_en', $post->excerpt_en) }}</textarea>
        </div>
      </div>
    </div>

    <!-- Corps -->
    <div class="postbox">
      <div class="postbox-header"><h2>Corps de l'article</h2></div>
      <div class="inside">
        <div style="margin-bottom:16px;">
          <div class="ck-editor-wrapper">
            <div class="ck-editor-label">🇫🇷 Contenu français</div>
            <div id="editor-body-fr"></div>
          </div>
          <textarea name="body_fr" id="textarea-body-fr" style="display:none;">{{ old('body_fr', $post->body_fr) }}</textarea>
        </div>
        <div>
          <div class="ck-editor-wrapper">
            <div class="ck-editor-label">🇬🇧 English content</div>
            <div id="editor-body-en"></div>
          </div>
          <textarea name="body_en" id="textarea-body-en" style="display:none;">{{ old('body_en', $post->body_en) }}</textarea>
        </div>
      </div>
    </div>

  </div><!-- /#post-body -->

  <!-- SIDEBAR -->
  <div id="postbox-container-1">

    <div class="postbox">
      <div class="postbox-header"><h2>Publier</h2></div>
      <div class="inside">
        <div class="publish-status-row">
          <span>Statut</span>
          <strong>{{ $post->published ? 'Publié' : 'Brouillon' }}</strong>
        </div>
        <div class="publish-status-row">
          <span>Visibilité</span>
          <strong>Public</strong>
        </div>
        @if($post->published_at)
        <div class="publish-status-row">
          <span>Publié le</span>
          <strong>{{ $post->published_at->format('d/m/Y') }}</strong>
        </div>
        @endif
        <div class="wp-check" style="margin-bottom:12px;">
          <input type="checkbox" name="published" value="1" id="published" {{ $post->published ? 'checked' : '' }} />
          <label for="published">{{ $post->published ? 'Publié' : 'Publier' }}</label>
        </div>
        <div class="publish-action">
          <button type="button" class="button-link-delete" onclick="document.getElementById('delete-form-{{ $post->id }}').submit()">Corbeille</button>
          <button type="submit" class="button button-primary">Mettre à jour</button>
        </div>
      </div>
    </div>

    <div class="postbox">
      <div class="postbox-header"><h2>Tags</h2></div>
      <div class="inside">
        <input type="text" name="tags"
          value="{{ old('tags', is_array($post->tags) ? implode(', ', $post->tags) : '') }}"
          class="wp-input" placeholder="IE, Cameroun, OSINT" />
        <span class="description" style="display:block;font-size:12px;color:#646970;margin-top:4px;">Séparer par des virgules.</span>
      </div>
    </div>

    <div class="postbox">
      <div class="postbox-header"><h2>Permalien</h2></div>
      <div class="inside">
        <p style="font-size:12px;color:#646970;margin:0 0 6px;">/blog/</p>
        <code style="font-size:12px;background:#f0f0f1;padding:4px 8px;border-radius:2px;display:block;word-break:break-all;">{{ $post->slug }}</code>
      </div>
    </div>

    <!-- Image mise en avant -->
    <div class="postbox">
      <div class="postbox-header"><h2>Image mise en avant</h2></div>
      <div class="inside">
        @if($post->image)
        <div id="featured-image-preview" style="margin-bottom:10px;">
          <img id="featured-image-thumb" src="{{ $post->image }}" alt="Image mise en avant" style="width:100%;border-radius:3px;border:1px solid #c3c4c7;" />
          <button type="button" onclick="removeImage()" style="margin-top:6px;font-size:12px;color:#b32d2e;background:none;border:none;cursor:pointer;padding:0;">✕ Supprimer / remplacer</button>
        </div>
        <label for="image" id="featured-image-label" style="display:none;padding:12px;border:2px dashed #c3c4c7;border-radius:3px;text-align:center;cursor:pointer;color:#646970;font-size:13px;">
        @else
        <div id="featured-image-preview" style="display:none;margin-bottom:10px;">
          <img id="featured-image-thumb" src="" alt="Aperçu" style="width:100%;border-radius:3px;border:1px solid #c3c4c7;" />
          <button type="button" onclick="removeImage()" style="margin-top:6px;font-size:12px;color:#b32d2e;background:none;border:none;cursor:pointer;padding:0;">✕ Supprimer l'image</button>
        </div>
        <label for="image" id="featured-image-label" style="display:block;padding:12px;border:2px dashed #c3c4c7;border-radius:3px;text-align:center;cursor:pointer;color:#646970;font-size:13px;">
        @endif
          <svg style="width:24px;height:24px;margin:0 auto 6px;display:block;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
          Changer l'image mise en avant
        </label>
        <input type="file" name="image" id="image" accept="image/*" style="display:none;" onchange="previewImage(this)" />
      </div>
    </div>

  </div>

</div>
</form>

{{-- Formulaire delete séparé (hors du formulaire principal) --}}
<form id="delete-form-{{ $post->id }}" method="POST" action="{{ route('admin.posts.destroy', $post) }}"
  style="display:none;" onsubmit="return confirm('Supprimer cet article ?')">
  @csrf @method('DELETE')
</form>

<script>
function previewImage(input) {
  const preview = document.getElementById('featured-image-preview');
  const thumb = document.getElementById('featured-image-thumb');
  const label = document.getElementById('featured-image-label');
  if (input.files && input.files[0]) {
    const reader = new FileReader();
    reader.onload = e => { thumb.src = e.target.result; preview.style.display = 'block'; label.style.display = 'none'; };
    reader.readAsDataURL(input.files[0]);
  }
}
function removeImage() {
  document.getElementById('image').value = '';
  document.getElementById('featured-image-preview').style.display = 'none';
  document.getElementById('featured-image-label').style.display = 'block';
}
</script>

@endsection

@push('scripts')
<script>
const CK_CONFIG = {
  toolbar: {
    items: [
      'heading', '|',
      'bold', 'italic', 'underline', 'strikethrough', '|',
      'bulletedList', 'numberedList', '|',
      'outdent', 'indent', '|',
      'blockQuote', 'link', '|',
      'alignment', '|',
      'undo', 'redo'
    ]
  },
  heading: {
    options: [
      { model: 'paragraph', title: 'Paragraphe', class: 'ck-heading_paragraph' },
      { model: 'heading2', view: 'h2', title: 'Titre 2', class: 'ck-heading_heading2' },
      { model: 'heading3', view: 'h3', title: 'Titre 3', class: 'ck-heading_heading3' },
      { model: 'heading4', view: 'h4', title: 'Titre 4', class: 'ck-heading_heading4' },
    ]
  },
  language: 'fr',
};

const editors = {};

const editorDefs = [
  { id: 'editor-excerpt-fr', textarea: 'textarea-excerpt-fr', minHeight: '100px' },
  { id: 'editor-excerpt-en', textarea: 'textarea-excerpt-en', minHeight: '100px' },
  { id: 'editor-body-fr',    textarea: 'textarea-body-fr',    minHeight: '320px' },
  { id: 'editor-body-en',    textarea: 'textarea-body-en',    minHeight: '320px' },
];

editorDefs.forEach(({ id, textarea, minHeight }) => {
  const el = document.getElementById(id);
  const ta = document.getElementById(textarea);

  ClassicEditor.create(el, {
    ...CK_CONFIG,
    initialData: ta.value || '',
  })
  .then(editor => {
    editors[id] = editor;
    editor.editing.view.change(writer => {
      writer.setStyle('min-height', minHeight, editor.editing.view.document.getRoot());
    });
  })
  .catch(console.error);
});

document.getElementById('post-form').addEventListener('submit', () => {
  editorDefs.forEach(({ id, textarea }) => {
    if (editors[id]) {
      document.getElementById(textarea).value = editors[id].getData();
    }
  });
});
</script>
@endpush
