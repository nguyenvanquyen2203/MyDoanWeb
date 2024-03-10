async function init() {
    const response = await fetch('../.env');
    return response;
    // return await response.text();
    // .then(text => {
    //     const lines = text.split('\n');
    //     lines.forEach(line => {
    //         if(line) {
    //             const [key, value] = line.split('=');
    //             if(key.trim()==='TOKEN') return value;
    //             // window[key.trim()] = value.trim();
    //         }
    //     });
    // });
    // return null;
  };