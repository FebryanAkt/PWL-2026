<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Group;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Support\Icons\Heroicon;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // 🔹 KIRI (2/3)
                Section::make("Post Details")
                    ->description("Fill in the details of the post")
                    ->icon(Heroicon::OutlinedDocumentText)
                    ->schema([

                        // field utama 2 kolom
                        Group::make([
                            TextInput::make("title")
                                ->required()
                                ->minLength(5)
                                ->validationMessages([
                                    "required" => "Title wajib diisi",
                                    "min" => "Title minimal 5 karakter",
                                ]),

                            TextInput::make("slug")
                                ->required()
                                ->minLength(3)
                                ->unique(ignoreRecord: true)
                                ->validationMessages([
                                    "required" => "Slug wajib diisi",
                                    "min" => "Slug minimal 3 karakter",
                                    "unique" => "Slug harus unik",
                                ]),

                            Select::make("category_id")
                                ->relationship("category", "name")
                                ->preload()
                                ->searchable()
                                ->required()
                                ->validationMessages([
                                    "required" => "Category wajib dipilih",
                                ]),

                            ColorPicker::make("color"),
                        ])
                        ->columns(2),

                        // full width
                        MarkdownEditor::make("content")
                            ->columnSpanFull(),

                    ])
                    ->columnSpan(2),

                // 🔹 KANAN (1/3)
                Group::make([

                    Section::make("Image Upload")
                        ->icon(Heroicon::OutlinedPhoto)
                        ->schema([
                            FileUpload::make("image")
                                ->disk("public")
                                ->directory("posts")
                                ->required()
                                ->validationMessages([
                                    "required" => "Image wajib diupload",
                                ]),
                        ]),

                    Section::make("Meta Information")
                        ->icon(Heroicon::OutlinedAdjustmentsHorizontal)
                        ->schema([
                            TagsInput::make("tags"),
                            Checkbox::make("published"),
                            DateTimePicker::make("published_at"),
                        ]),

                ])
                ->columnSpan(1),

            ])
            ->columns(3);
    }
}