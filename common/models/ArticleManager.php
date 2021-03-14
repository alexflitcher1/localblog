<?php
namespace common\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use frontend\models\Articles;

class ArticleManager extends Model
{
    public $id, $title, $img, $text, $descr;

    public function get()
    {
        return Articles::findOne(['id' => $this->id]);
    }

    public function getAll()
    {
        return Articles::find()->all();
    }

    public function set()
    {
        $article = new Articles();

        if ($this->validate()) {
            $name = $this->img->baseName
            . '_' . time() .'.' . $this->img->extension;
            $this->img->saveAs('photos/' . $name);
            $article->title = $this->title;
            $article->img   = $name;
            $article->text  = $this->text;
            $article->text .= "\n" . date("Y m j G:i", time()) . "\n";
            $article->descr = $this->descr;
            if ($article->save())
                return Yii::$app->db->getLastInsertID();
        }
        return false;
    }

    public function update($update)
    {
        $article = Articles::findOne(['id' => $this->id]);
        $article->$update = $this->$update;
        if ($article->save())
            return true;
        return false;
    }

    public function delete()
    {
        $article = Articles::findOne(['id' => $this->id]);
        if ($article->delete())
            return true;
        return false;
    }

    public function rules()
    {
        return [
            [['img'], 'file', 'skipOnEmpty' => false,
            'extensions' => 'png, jpg'],
            [['title', 'descr', 'text'], 'required',
            'message' => 'Введите что-нибудь в поле'],
        ];
    }
}
