import { Component } from '@angular/core';
import { Post } from './post';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'front';
  //Aqui receberemos os objetos laravel via HttpRequest
  private posts: Post[] = [
    new Post("João", "Meu post", "Sub joão", "joao@gmail.com", "Minha Mensagem"),
    new Post("João", "Meu post", "Sub joão", "joao@gmail.com", "Minha Mensagem"),
  ];
}
