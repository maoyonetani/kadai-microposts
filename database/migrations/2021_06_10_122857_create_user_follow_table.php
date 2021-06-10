<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFollowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('user_follow', function (Blueprint $table) {
            //Schemaファザードでcreateメソッド
            //createメソッドでは、第１引数にテーブル名のusers、第２引数にクロージャを指定する。
            //クロージャでは、第１引数にBlueprintオブジェクト、第２引数に$tableを指定する。
            //Blueprintオブジェクトのメソッドでカラムを定義する。カラムの型名が、そのままメソッド名になっている。
            //メソッドの実行には->（メソッドチェーン）が使用される。
           
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('follow_id');
            $table->timestamps();

            // 外部キー制約
            //onDeleteは参照先のデータが削除されたときにこのテーブルの行をどのように扱うかを指定します
            //cascade: 一緒に消す (このテーブルのデータも一緒に消えます）
            //onDelete('cascade') とすることでユーザテーブルのデータが削除されると同時に、
            //それにひもづくフォローテーブルのフォロー、フォロワーのレコードも削除されるようにしました。
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('follow_id')->references('id')->on('users')->onDelete('cascade');

            // user_idとfollow_idの組み合わせの重複を許さない
            $table->unique(['user_id', 'follow_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_follow');
        //クロージャにup関数とdown関数が存在
        //dropIfExistsは、引数であるusersテーブルが存在していた場合、それを削除するメソッド
        
    }
}
