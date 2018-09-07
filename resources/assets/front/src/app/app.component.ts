import { Component } from '@angular/core';
import { Event } from './event';
import { MatDialog } from '@angular/material';
import { EventDialogComponent } from './event-dialog/event-dialog.component';
import { EventService } from './event.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'front';

  //Aqui receberemos os objetos laravel via HttpRequest
  private events: Event[];

  constructor(
    public dialog: MatDialog,
    public eventService: EventService
  ){}

  //Esta função é chamada após o construtor depois que toda a parte gráfica é carregada
  //O angular executa essa função automáticamente
  ngOnInit(){
    this.events = this.eventService.events; 
  } 

  openDialog(){
    const dialogRef = this.dialog.open(EventDialogComponent, 
      { width: '600px' });
    dialogRef.afterClosed().subscribe(
      (result) => {
        if (result) {
          console.log(result);
          this.eventService.save(result.event, result.arquivo); 
        }
      }
    )
  }
}
