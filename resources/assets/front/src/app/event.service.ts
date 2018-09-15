import { Injectable } from '@angular/core';
import { HttpClient, HttpEventType } from '@angular/common/http';
import { Event } from './event';

@Injectable()
export class EventService {


  //Aqui receberemos os objetos laravel via HttpRequest
  public events: Event[] = [];  

  //Make a connection with the server
  constructor(private http: HttpClient) {
    //Here I will implements the entire access part
      this.http.get('/api/events').subscribe(
        (events: any[]) =>{
          for(let e of events){
            this.events.push(
              new Event(    
                e.name,
                e.description,
                e.beginning_date,
                e.end_date,
                //e.photo
              )
            );
          }
        }
      );
  }

  save(event: Event, file: File){
    //Em casos que se queira enviar arquivos junto com a requisição
    //utilizar form-data
    const uploadData = new FormData();
    uploadData.append('name',event.name);
    uploadData.append('description',event.description);
    uploadData.append('beginning_date',this.dateFormat(event.beginning_date));
    uploadData.append('end_date',this.dateFormat(event.end_date));
    //uploadData.append('file',file, file.name);

    this.http.post("/api/events", uploadData, { reportProgress: true, observe: 'events'}).subscribe(    
      (event: any)=>{
        if(event.type == HttpEventType.Response){
          let e:any = event.body;
          this.events.push(
            new Event(    
              e.name,
              e.description,
              e.beginning_date,
              e.end_date
              //e.photo
            )
          );
          console.log(event);
        }
      }
    );
  }

  dateFormat(dateToFormat){
    var date = new Date(dateToFormat);
    var year=date.getFullYear();
    var month=date.getMonth()+1 //getMonth is zero based;
    var day=date.getDate();
    var formatted=year+"-"+month+"-"+day;
    return formatted;
  }

  


}
