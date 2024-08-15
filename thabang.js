import { initializeApp } from "firebase/app";
import { getFirestore } from "firebase/firestore";


    var myBtn = document.getElementById('dataBtn');

    myBtn.onclick = async function () {
        console.log('inside the inside function');
    }

    const firebaseConfig = {
        apiKey: "AIzaSyAmfC2pEUrToIahPxEwHUcf5w35digazzs",
            authDomain: "limphack-f98fd.firebaseapp.com",
            databaseURL: "https://limphack-f98fd-default-rtdb.firebaseio.com",
            projectId: "limphack-f98fd",
            storageBucket: "limphack-f98fd.appspot.com",
            messagingSenderId: "291693080426",
            appId: "1:291693080426:web:6d0fbb7bbb5766ebbf7f13"
      };
      
      // Initialize Firebase
      const app = initializeApp(firebaseConfig);
      
    //   firebase.initializeApp(firebaseConfig);
      
      const db = getFirestore(app);


    console.log('done initializing the db');
  try {
    const dataRef = db.ref('hackers');

    dataRef.on('value', (snapshot) => {
        const data = snapshot.val();
        console.log(JSON.stringify(data, null, 2));
    })
  } catch (error) {
    console.error('Error exporting data:', error);
  }
  





//    function getExcel(){
//     document.getElementById('exportButton').addEventListener('click', async () => {
//         try {
//           const snapshot = await db.collection('hackers').get();
//           const data = [];
      
//           snapshot.forEach(doc => {
//             data.push(doc.data());
//           });
      
//           const worksheet = XLSX.utils.json_to_sheet(data);
//           const workbook = XLSX.utils.book_new();
//           XLSX.utils.book_append_sheet(workbook, worksheet, 'Data');
//           XLSX.writeFile(workbook, 'output.xlsx');
      
//           console.log('Excel file generated successfully.');
//         } catch (error) {
//           console.error('Error exporting data:', error);
//         }
//       });
//    }
  
  