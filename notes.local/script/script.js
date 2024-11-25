  document.querySelectorAll('#edit').forEach(f=>{
    f.addEventListener('click',e=>{
      e.preventDefault();
      
      if( e.target instanceof HTMLButtonElement ){
        let section=e.target.closest('section')
        let id=section.id;
        let date=section.querySelector('#dateNotes').textContent;
        let textCon=section.querySelector('#textArea').textContent;
        let heading=section.querySelector('#headingH2').textContent;
        let bttn=e.target.value;
  
        let fd=new FormData();
          fd.set('id',id);
          fd.set('bttn',bttn);
          fd.set('heading',heading);
          fd.set('text',textCon);
          fd.set('date',date);

          document.location = './editNote.php?addText='+textCon+'&addDate='+date+'&addHeading='+heading+'&addId='+id; 
      }
    });
  })