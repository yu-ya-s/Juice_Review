<?php

namespace Tests\Feature;

use App\Models\Juice_Review;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;


class juiceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // public function testExample()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    // 必要なカラムがマイグレーションされているかのテスト
    public function testColumn()
    {
        $this->assertTrue(
            Schema::hasColumns('juice_reviews', [
                'id', 'created_at', 'updated_at','name','star','store','area','review','image','prefecture','user_id'
            ])
        );
    }

    // データが登録され、id,created_at、updated_at、カラムが自動で登録される、また画像ファイルがs3に登録され、
    // 画像へのアクセスurlがDBに登録されることの確認

    // public function testCreateJuice(){
    //     $juice = new Juice_Review();
    //     Storage::fake('image');
    //     $file = UploadedFile::fake()->image('image.jpg');
    //     $path = Storage::disk('s3')->put('/',$file,'public');
    //     $image = Storage::disk('s3')->url($path);
    //     $juice->name = 'test';
    //     $juice->star = 5;
    //     $juice->store = 'teststore';
    //     $juice->area = 1;
    //     $juice->review = 'good';
    //     $juice->image = $image;
    //     $juice->prefecture = 1;
    //     $juice->user_id = 1;
    //     $saveJuice = $juice->save();
    //     $this->assertTrue($saveJuice);
    // }

    public function testUpdateJuice(){
        $update = [
            'id' =>"1",
            // 'created_at' => '2020-10-23 16:19:14',
            // 'updated_at' => '2020-10-23 16:19:14',
            'name' => 'test',
            'star' => '5',
            'store' => 'teststore',
            'area' => '1',
            'review' => 'good',
            // 'image' => 'image',
            'prefecture' => '1',
            'user_id' => '1'
        ];
        // $this->assertDatabaseMissing('juice_reviews',$update);
        // $response = $this->put('/update/1',$update);
        Juice_Review::where('id', 1)->update($update);
        $this->assertDatabaseHas('juice_reviews',$update);
    }

}


