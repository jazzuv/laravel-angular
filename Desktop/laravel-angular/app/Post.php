<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{


  public function testStoresPostSuccessfully()
  {
   
    $post = factory(App\Post::class)->make();
    
    $this->post('/api/posts', [      
      'topic' => $post->topic,
      ])->seeApiSuccess()
      ->seeJsonObject('post')
      ->seeJson([        
        'topic' => $post->topic,
      ]);
    
    $this->seeInDatabase('posts', [      
      'topic' => $post->topic,
      ]);
  }
  
}