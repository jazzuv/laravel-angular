class CreatePostFormController{
    constructor(API, ToastService){
        'ngInject';
      
        this.API = API;
        this.ToastService = ToastService;

    }
    
   submit(){
      var data = {        
        topic: this.topic,
      };
        this.topic ='';
        this.API.all('posts').post(data).then((response) => {           
           this.get_data();
        this.ToastService.show('Post added successfully');
       });
    }
    

    get_data(){                    
          this.API.all('get-posts').post().then((response) => {           
          this.assignments=response.data;                   
         });
    }


}

export const CreatePostFormComponent = {
    templateUrl: './views/app/components/create_post_form/create_post_form.component.html',
    controller: CreatePostFormController,
    controllerAs: 'vm',
    bindings: { }
}