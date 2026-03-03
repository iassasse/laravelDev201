@extends('layouts.app')

@section('title', 'CGV - Conditions Générales de Vente - ' . $config['company']['name'])

@section('content')
<h1 class="page-title">Conditions Générales de Vente (CGV)</h1>

<div class="cgv-content">
    @foreach($cgvSections as $section)
    <div class="cgv-section">
        <h2>{{ $section['title'] }}</h2>

        @if(isset($section['paragraphs']))
        @foreach($section['paragraphs'] as $paragraph)
        <p>{!! $paragraph !!}</p>
        @endforeach
        @endif

        @if(isset($section['items']))
        <ul>
            @foreach($section['items'] as $item)
            <li>{{ $item }}</li>
            @endforeach
        </ul>
        @endif

        @if(isset($section['subsections']))
        @foreach($section['subsections'] as $subsection)
        <h3>{{ $subsection['title'] }}</h3>

        @if(isset($subsection['paragraphs']))
        @foreach($subsection['paragraphs'] as $paragraph)
        <p>{!! $paragraph !!}</p>
        @endforeach
        @endif

        @if(isset($subsection['items']))
        <ul>
            @foreach($subsection['items'] as $item)
            <li>{{ $item }}</li>
            @endforeach
        </ul>
        @endif
        @endforeach
        @endif
    </div>
    @endforeach

    <div class="update-box">
        <p><strong>Date de mise à jour :</strong> 22 février 2026</p>
        <p>Ces Conditions Générales de Vente sont valables à compter de la date mentionnée et jusqu'à modification ultérieure.</p>
    </div>
</div>
@endsection