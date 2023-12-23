import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-faq',
  templateUrl: './faq.component.html',
  styleUrls: ['./faq.component.scss']
})
export class FaqComponent implements OnInit {

  constructor() { }

  DropdownVar = 0;

  DropdownsubVar = 0;

  onSelect(x){
   this.DropdownVar = x;
   this.DropdownsubVar = x;
   console.log(x);
  }

  ngOnInit() {
  }

}
