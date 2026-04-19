@extends('admin.layout')
@section('title', 'Nouveau service')
@section('content')

<div class="title-area">
  <h1 class="wp-heading-inline">Ajouter un service</h1>
  <a href="{{ route('admin.services.index') }}" class="button" style="margin-left:8px;">← Retour</a>
</div>

<form method="POST" action="{{ route('admin.services.store') }}">
@csrf

<div id="poststuff">
  <!-- MAIN COLUMN -->
  <div id="post-body">

    <!-- Titre FR -->
    <div class="postbox">
      <div class="postbox-header" style="border-bottom:none;padding-bottom:0;">
        <h2 style="font-size:13px;color:#646970;font-weight:400;">Titre français</h2>
      </div>
      <div class="inside" style="padding-top:0;">
        <input type="text" id="title" name="title_fr" value="{{ old('title_fr') }}" placeholder="Nom du service en français…" required />
        @error('title_fr')<p class="field-error">{{ $message }}</p>@enderror
      </div>
    </div>

    <!-- Titre EN -->
    <div class="postbox">
      <div class="postbox-header" style="border-bottom:none;padding-bottom:0;">
        <h2 style="font-size:13px;color:#646970;font-weight:400;">Titre anglais</h2>
      </div>
      <div class="inside" style="padding-top:0;">
        <input type="text" name="title_en" value="{{ old('title_en') }}" placeholder="Service name in English…" required
          style="width:100%;padding:12px 14px;font-size:22px;font-weight:400;border:1px solid #c3c4c7;border-radius:3px;color:#1d2327;outline:none;line-height:1.4;" />
      </div>
    </div>

    <!-- Résumé -->
    <div class="postbox">
      <div class="postbox-header"><h2>Résumé (courte description)</h2></div>
      <div class="inside">
        <div class="lang-tabs-group">
          <div>
            <div class="lang-tabs">
              <button type="button" class="lang-tab active" data-target="sum-fr">🇫🇷 Français</button>
              <button type="button" class="lang-tab" data-target="sum-en">🇬🇧 English</button>
            </div>
            <div id="sum-fr" class="lang-panel active" style="border:1px solid #c3c4c7;border-top:none;padding:8px;">
              <textarea name="summary_fr" rows="3" required class="wp-textarea" style="border:none;box-shadow:none;padding:0;"
                placeholder="Résumé en français…">{{ old('summary_fr') }}</textarea>
              @error('summary_fr')<p class="field-error">{{ $message }}</p>@enderror
            </div>
            <div id="sum-en" class="lang-panel" style="border:1px solid #c3c4c7;border-top:none;padding:8px;">
              <textarea name="summary_en" rows="3" required class="wp-textarea" style="border:none;box-shadow:none;padding:0;"
                placeholder="English summary…">{{ old('summary_en') }}</textarea>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Corps -->
    <div class="postbox">
      <div class="postbox-header"><h2>Description détaillée</h2></div>
      <div class="inside">
        <div class="lang-tabs-group">
          <div>
            <div class="lang-tabs">
              <button type="button" class="lang-tab active" data-target="body-fr">🇫🇷 Français</button>
              <button type="button" class="lang-tab" data-target="body-en">🇬🇧 English</button>
            </div>
            <div id="body-fr" class="lang-panel active" style="border:1px solid #c3c4c7;border-top:none;padding:8px;">
              <textarea name="body_fr" rows="12" required class="wp-textarea code" style="border:none;box-shadow:none;padding:0;"
                placeholder="Description complète en français…">{{ old('body_fr') }}</textarea>
              @error('body_fr')<p class="field-error">{{ $message }}</p>@enderror
            </div>
            <div id="body-en" class="lang-panel" style="border:1px solid #c3c4c7;border-top:none;padding:8px;">
              <textarea name="body_en" rows="12" required class="wp-textarea code" style="border:none;box-shadow:none;padding:0;"
                placeholder="Full description in English…">{{ old('body_en') }}</textarea>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div><!-- /#post-body -->

  <!-- SIDEBAR -->
  <div id="postbox-container-1">

    <!-- Publish box -->
    <div class="postbox">
      <div class="postbox-header"><h2>Enregistrer</h2></div>
      <div class="inside">
        <div class="publish-action" style="margin:0 -12px -12px;padding:10px 12px;background:#f6f7f7;border-top:1px solid #c3c4c7;border-radius:0 0 3px 3px;display:flex;justify-content:flex-end;">
          <button type="submit" class="button button-primary">Enregistrer</button>
        </div>
      </div>
    </div>

    <!-- Attributs -->
    <div class="postbox">
      <div class="postbox-header"><h2>Attributs</h2></div>
      <div class="inside">
        <div class="form-field">
          <label>Icône (nom)</label>
          <input type="text" name="icon" value="{{ old('icon', 'briefcase') }}" class="wp-input" placeholder="briefcase, chart-bar…" />
          <span class="description">Nom d'icône utilisé dans la page Services.</span>
        </div>
        <div class="form-field">
          <label>Ordre d'affichage</label>
          <input type="number" name="order" value="{{ old('order', 0) }}" class="wp-input small-text" min="0" />
          <span class="description">0 = premier.</span>
        </div>
      </div>
    </div>

  </div>

</div>
</form>

@endsection
