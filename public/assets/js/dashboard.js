$(function()
        {
            require.config({
                paths: {
                    echarts: 'assets/js/plugins/visualization/echarts'
                }
            });

            var dateArray = [];

            var d = new Date(),
                n = d.getMonth(),
                firstDay = new Date(d.getFullYear(), d.getMonth(), 1)
                lastDay = new Date(d.getFullYear(), d.getMonth() + 1, 0);

            $('#cbMonth option:eq('+n+')').attr('selected', 'selected').trigger('change');

            for(var x = firstDay; x <= lastDay; x.setDate(x.getDate() + 1))
            {
                dateArray.push(moment(new Date(x)).format('YYYY-MM-DD'));
            }

            /*
                * Set area chart
            */
            $('.loader-container').fadeIn('slow');
            $('.page-container').addClass('blur');
           
            $.ajax(
            {
                url: '/Dashboard/get-chart-area-data',
                type: 'POST',
                data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        month: n+1,
                        type: $('#cbType').val()
                    },
                success: function(resp)
                {
                    var indexes = [];
                    var values = [];
                    var data = [];
                    if(resp['total'][0].totalCompany != null && resp['total'][0].totalCompany != "")
                        $("#total").text("Total: " + resp['total'][0].totalCompany + " Company");
                    else
                         $("#total").text("Total: 0 Company");
                    if($.isArray(resp['data']))
                    {
                        if(resp['data'].length != 0)
                        {
                            $.each(resp['data'], function(idx, el)
                            {
                                var currentDate = moment(new Date(el.created_at)).format('YYYY-MM-DD');

                                if(dateArray.indexOf(currentDate) != -1){
                                    indexes.push(dateArray.indexOf(currentDate));
                                    values.push(el.totalCompany);
                                }
                            });

                            for(var i = 0; i < dateArray.length; i++)
                            {
                                data.push(0);                            
                            }

                            for(var i = 0; i < indexes.length; i++)
                            {
                                data[indexes[i]] = parseInt(values[i]);
                            };
                        }
                        else
                        {
                            for(var i = 0; i < dateArray.length; i++)
                            {
                                data.push(0);                            
                            }
                        }

                        require(
                            [
                                'echarts',
                                'echarts/theme/limitless',
                                'echarts/chart/bar',
                                'echarts/chart/line'
                            ],

                            function(ec, limitless)
                            {
                                var basic_area = ec.init(document.getElementById('basic_area'), limitless);

                                basic_area_options = {

                                    // Setup grid
                                    grid: {
                                        x: 40,
                                        x2: 20,
                                        y: 35,
                                        y2: 25
                                    },

                                    // Add tooltip
                                    tooltip: {
                                        trigger: 'axis'
                                    },

                                    // Add legend
                                    legend: {
                                        data: ['Company']
                                    },


                                    // Enable drag recalculate
                                    calculable: true,

                                    // Horizontal axis
                                    xAxis: [{
                                        type: 'category',
                                        boundaryGap: false,
                                        data: dateArray
                                    }],

                                    // Vertical axis
                                    yAxis: [{
                                        type: 'value'
                                    }],

                                    // Add series
                                    series: [
                                        {
                                            name: 'Total Company',
                                            type: 'line',
                                            smooth: true,
                                            itemStyle: {normal: {areaStyle: {type: 'default'}}},
                                            data: data
                                        }
                                    ]
                                };

                                basic_area.setOption(basic_area_options);
                                window.onresize = function () {
                                    setTimeout(function () {
                                        basic_area.resize();
                                    }, 200);
                                }
                            }
                        );

                        $('.loader-container').fadeOut('slow');
                        $('.page-container').removeClass('blur');
                    }
                    else
                    {
                        alert("There's no data");
                    }
                },
                error: function(textStatus)
                {
                   alert('whops something happen');
                }
            });

            /* /end of se */

            /*
                * Set on change select function
            */

            $('#cbMonth').on('change', function()
            {
                $('.loader-container').fadeIn('slow');
                $('.page-container').addClass('blur');
                dateArray = [];

                var val = $(this).val();
                firstDay = new Date(d.getFullYear(), val - 1, 1);
                lastDay = new Date(d.getFullYear(), val, 0);

                for(var x = firstDay; x <= lastDay; x.setDate(x.getDate() + 1))
                {
                    dateArray.push(moment(new Date(x)).format('YYYY-MM-DD'));
                }

                if($('#cbType').val() == 'company')
                {
                    $.ajax(
                    {
                        url: '/Dashboard/get-chart-area-data',
                        type: 'POST',
                        data: {
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                month: val,
                                type: $('#cbType').val()
                            },
                        success: function(resp)
                        {
                            var indexes = [];
                            var values = [];
                            var data = [];
                            if(resp['total'][0].totalCompany != null && resp['total'][0].totalCompany != "")
                                $("#total").text("Total: " + resp['total'][0].totalCompany + " Company");
                            else
                                 $("#total").text("Total: 0 Company");
                            if($.isArray(resp['data']))
                            {
                                if(resp['data'].length != 0)
                                {
                                    $.each(resp, function(idx, el)
                                    {
                                        var currentDate = moment(new Date(el.created_at)).format('YYYY-MM-DD');

                                        if(dateArray.indexOf(currentDate) != -1){
                                            indexes.push(dateArray.indexOf(currentDate));
                                            values.push(el.totalCompany);
                                        }
                                    });

                                    for(var i = 0; i < dateArray.length; i++)
                                    {
                                        data.push(0);                            
                                    }

                                    for(var i = 0; i < indexes.length; i++)
                                    {
                                        data[indexes[i]] = parseInt(values[i]);
                                    };
                                }
                                else
                                {
                                    for(var i = 0; i < dateArray.length; i++)
                                    {
                                        data.push(0);                            
                                    }
                                }

                                require(
                                    [
                                        'echarts',
                                        'echarts/theme/limitless',
                                        'echarts/chart/bar',
                                        'echarts/chart/line'
                                    ],

                                    function(ec, limitless)
                                    {
                                        var basic_area = ec.init(document.getElementById('basic_area'), limitless);

                                        basic_area_options = {

                                            // Setup grid
                                            grid: {
                                                x: 40,
                                                x2: 20,
                                                y: 35,
                                                y2: 25
                                            },

                                            // Add tooltip
                                            tooltip: {
                                                trigger: 'axis'
                                            },

                                            // Add legend
                                            legend: {
                                                data: ['Company']
                                            },


                                            // Enable drag recalculate
                                            calculable: true,

                                            // Horizontal axis
                                            xAxis: [{
                                                type: 'category',
                                                boundaryGap: false,
                                                data: dateArray
                                            }],

                                            // Vertical axis
                                            yAxis: [{
                                                type: 'value'
                                            }],

                                            // Add series
                                            series: [
                                                {
                                                    name: 'Total Company',
                                                    type: 'line',
                                                    smooth: true,
                                                    itemStyle: {normal: {areaStyle: {type: 'default'}}},
                                                    data: data
                                                }
                                            ]
                                        };

                                        basic_area.setOption(basic_area_options);
                                        window.onresize = function () {
                                            setTimeout(function () {
                                                basic_area.resize();
                                            }, 200);
                                        }
                                    }
                                );

                                $('.loader-container').fadeOut('slow');
                                $('.page-container').removeClass('blur');
                            }
                            else
                            {
                                $('.loader-container').fadeOut('slow');
                                $('.page-container').removeClass('blur');
                                alert("There's no data");
                            }
                        },
                        error: function(textStatus)
                        {
                            $('.loader-container').fadeOut('slow');
                            $('.page-container').removeClass('blur');
                            alert('Whoops something happen');
                            location.reload();
                        }
                    });
                }
                else if($('#cbType').val() == 'student')
                {
                    $.ajax(
                    {
                        url: '/Dashboard/get-chart-area-data',
                        type: 'POST',
                        data: {
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                month: val,
                                type: $('#cbType').val()
                            },
                        success: function(resp)
                        {
                            var indexes = [];
                            var values = [];
                            var data = [];
                            if(resp['total'][0].totalStudent != null && resp['total'][0].totalStudent != "")
                                $("#total").text("Total: " + resp['total'][0].totalStudent + " Students");
                            else
                                 $("#total").text("Total: 0 Student");

                            if(resp['totalUmn'][0].totalStudent != null && resp['totalUmn'][0].totalStudent != "")
                                $("#total-university").text("Total UMN: " + resp['totalUmn'][0].totalStudent + " Students");
                            else
                                 $("#total-university").text("Total UMN: 0 Student");

                            if($.isArray(resp['data']))
                            {
                                if(resp['data'].length != 0)
                                {
                                    $.each(resp['data'], function(idx, el)
                                    {
                                        var currentDate = moment(new Date(el.register_date)).format('YYYY-MM-DD');
        
                                        if(dateArray.indexOf(currentDate) != -1){
                                            indexes.push(dateArray.indexOf(currentDate));
                                            values.push(el.totalStudent);
                                        }
                                    });
        
                                    for(var i = 0; i < dateArray.length; i++)
                                    {
                                        data.push(0);                            
                                    }
        
                                    for(var i = 0; i < indexes.length; i++)
                                    {
                                        data[indexes[i]] = parseInt(values[i]);
                                    };
                                }
                                else
                                {
                                    for(var i = 0; i < dateArray.length; i++)
                                    {
                                        data.push(0);                            
                                    }
                                }
        
                                require(
                                    [
                                        'echarts',
                                        'echarts/theme/limitless',
                                        'echarts/chart/bar',
                                        'echarts/chart/line'
                                    ],
        
                                    function(ec, limitless)
                                    {
                                        var basic_area = ec.init(document.getElementById('basic_area'), limitless);
        
                                        basic_area_options = {
        
                                            // Setup grid
                                            grid: {
                                                x: 40,
                                                x2: 20,
                                                y: 35,
                                                y2: 25
                                            },
        
                                            // Add tooltip
                                            tooltip: {
                                                trigger: 'axis'
                                            },
        
                                            // Add legend
                                            legend: {
                                                data: ['Student']
                                            },
        
        
                                            // Enable drag recalculate
                                            calculable: true,
        
                                            // Horizontal axis
                                            xAxis: [{
                                                type: 'category',
                                                boundaryGap: false,
                                                data: dateArray
                                            }],
        
                                            // Vertical axis
                                            yAxis: [{
                                                type: 'value'
                                            }],
        
                                            // Add series
                                            series: [
                                                {
                                                    name: 'Total Student',
                                                    type: 'line',
                                                    smooth: true,
                                                    itemStyle: {normal: {areaStyle: {type: 'default'}}},
                                                    data: data
                                                }
                                            ]
                                        };
        
                                        basic_area.setOption(basic_area_options);
                                        window.onresize = function () {
                                            setTimeout(function () {
                                                basic_area.resize();
                                            }, 200);
                                        }
                                    }
                                );

                                $('.loader-container').fadeOut('slow');
                                $('.page-container').removeClass('blur');
                            }
                            else
                            {
                                $('.loader-container').fadeOut('slow');
                                $('.page-container').removeClass('blur');
                                alert("There's no data");
                            }
                        },
                        error: function(textStatus)
                        {
                            $('.loader-container').fadeOut('slow');
                            $('.page-container').removeClass('blur');
                            alert('Whoops something happen');
                            location.reload();
                        }
                    });
                }
                else
                {
                    $.ajax(
                    {
                        url: '/Dashboard/get-chart-area-data',
                        type: 'POST',
                        data: 
                        {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            month: val,
                            type: $('#cbType').val()
                        },
                        success: function(resp)
                        {
                            var indexes = [];
                            var values = [];
                            var data = [];
                            if(resp['total'][0].totalJobPost != null && resp['total'][0].totalJobPost != "")
                                $("#total").text("Total: " + resp['total'][0].totalJobPost + " Job Post");
                            else
                                 $("#total").text("Total: 0 Job Post");
                            if($.isArray(resp['data']))
                            {
                                if(resp['data'].length != 0)
                                {
                                    $.each(resp, function(idx, el)
                                    {
                                        var currentDate = moment(new Date(el.created_at)).format('YYYY-MM-DD');

                                        if(dateArray.indexOf(currentDate) != -1){
                                            indexes.push(dateArray.indexOf(currentDate));
                                            values.push(el.totalJobPost);
                                        }
                                    });

                                    for(var i = 0; i < dateArray.length; i++)
                                    {
                                        data.push(0);                            
                                    }

                                    for(var i = 0; i < indexes.length; i++)
                                    {
                                        data[indexes[i]] = parseInt(values[i]);
                                    };
                                }
                                else
                                {
                                    for(var i = 0; i < dateArray.length; i++)
                                    {
                                        data.push(0);                            
                                    }
                                }

                                require(
                                    [
                                        'echarts',
                                        'echarts/theme/limitless',
                                        'echarts/chart/bar',
                                        'echarts/chart/line'
                                    ],

                                    function(ec, limitless)
                                    {
                                        var basic_area = ec.init(document.getElementById('basic_area'), limitless);

                                        basic_area_options = {

                                            // Setup grid
                                            grid: {
                                                x: 40,
                                                x2: 20,
                                                y: 35,
                                                y2: 25
                                            },

                                            // Add tooltip
                                            tooltip: {
                                                trigger: 'axis'
                                            },

                                            // Add legend
                                            legend: {
                                                data: ['JobPost']
                                            },


                                            // Enable drag recalculate
                                            calculable: true,

                                            // Horizontal axis
                                            xAxis: [{
                                                type: 'category',
                                                boundaryGap: false,
                                                data: dateArray
                                            }],

                                            // Vertical axis
                                            yAxis: [{
                                                type: 'value'
                                            }],

                                            // Add series
                                            series: [
                                                {
                                                    name: 'Total Job Post',
                                                    type: 'line',
                                                    smooth: true,
                                                    itemStyle: {normal: {areaStyle: {type: 'default'}}},
                                                    data: data
                                                }
                                            ]
                                        };

                                        basic_area.setOption(basic_area_options);
                                        window.onresize = function () {
                                            setTimeout(function () {
                                                basic_area.resize();
                                            }, 200);
                                        }
                                    }
                                );

                                $('.loader-container').fadeOut('slow');
                                $('.page-container').removeClass('blur');
                            }
                            else
                            {
                                $('.loader-container').fadeOut('slow');
                                $('.page-container').removeClass('blur');
                                alert("There's no data");
                            }
                        },
                        error: function(textStatus)
                        {
                            $('.loader-container').fadeOut('slow');
                            $('.page-container').removeClass('blur');
                            alert('Whoops something happen');
                            location.reload();
                        }
                    });
                }
            });

            $('#cbType').on('change', function()
            {
                $('.loader-container').fadeIn('slow');
                $('.page-container').addClass('blur');
                dateArray = [];

                var val = $('#cbMonth').val();
                firstDay = new Date(d.getFullYear(), val - 1, 1);
                lastDay = new Date(d.getFullYear(), val, 0);

                for(var x = firstDay; x <= lastDay; x.setDate(x.getDate() + 1))
                {
                    dateArray.push(moment(new Date(x)).format('YYYY-MM-DD'));
                }

                if($(this).val() == 'company')
                {
                    $.ajax(
                    {
                        url: '/Dashboard/get-chart-area-data',
                        type: 'POST',
                        data: {
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                month: val,
                                type: $('#cbType').val()
                            },
                        success: function(resp)
                        {
                            var indexes = [];
                            var values = [];
                            var data = [];
                            if(resp['total'][0].totalCompany != null && resp['total'][0].totalCompany != "")
                                $("#total").text("Total: " + resp['total'][0].totalCompany + " Company");
                            else
                                 $("#total").text("Total: 0 Company");
                            if($.isArray(resp['data']))
                            {
                                if(resp['data'].length != 0)
                                {
                                    $.each(resp['data'], function(idx, el)
                                    {
                                        var currentDate = moment(new Date(el.created_at)).format('YYYY-MM-DD');
        
                                        if(dateArray.indexOf(currentDate) != -1){
                                            indexes.push(dateArray.indexOf(currentDate));
                                            values.push(el.totalCompany);
                                        }
                                    });
        
                                    for(var i = 0; i < dateArray.length; i++)
                                    {
                                        data.push(0);                            
                                    }
        
                                    for(var i = 0; i < indexes.length; i++)
                                    {
                                        data[indexes[i]] = parseInt(values[i]);
                                    };
                                }
                                else
                                {
                                    for(var i = 0; i < dateArray.length; i++)
                                    {
                                        data.push(0);                            
                                    }
                                }
        
                                require(
                                    [
                                        'echarts',
                                        'echarts/theme/limitless',
                                        'echarts/chart/bar',
                                        'echarts/chart/line'
                                    ],
        
                                    function(ec, limitless)
                                    {
                                        var basic_area = ec.init(document.getElementById('basic_area'), limitless);
        
                                        basic_area_options = {
        
                                            // Setup grid
                                            grid: {
                                                x: 40,
                                                x2: 20,
                                                y: 35,
                                                y2: 25
                                            },
        
                                            // Add tooltip
                                            tooltip: {
                                                trigger: 'axis'
                                            },
        
                                            // Add legend
                                            legend: {
                                                data: ['Company']
                                            },
        
        
                                            // Enable drag recalculate
                                            calculable: true,
        
                                            // Horizontal axis
                                            xAxis: [{
                                                type: 'category',
                                                boundaryGap: false,
                                                data: dateArray
                                            }],
        
                                            // Vertical axis
                                            yAxis: [{
                                                type: 'value'
                                            }],
        
                                            // Add series
                                            series: [
                                                {
                                                    name: 'Total Company',
                                                    type: 'line',
                                                    smooth: true,
                                                    itemStyle: {normal: {areaStyle: {type: 'default'}}},
                                                    data: data
                                                }
                                            ]
                                        };
        
                                        basic_area.setOption(basic_area_options);
                                        window.onresize = function () {
                                            setTimeout(function () {
                                                basic_area.resize();
                                            }, 200);
                                        }
                                    }
                                );

                                $('.loader-container').fadeOut('slow');
                                $('.page-container').removeClass('blur');
                            }
                            else
                            {
                                $('.loader-container').fadeOut('slow');
                                $('.page-container').removeClass('blur');
                                alert("There's no data");
                            }
                        },
                        error: function(textStatus)
                        {
                            $('.loader-container').fadeOut('slow');
                            $('.page-container').removeClass('blur');
                            alert('Whoops something happen');

                            location.reload();
                        }
                    });
                }
                else if($('#cbType').val() == 'student')
                {
                    $.ajax(
                    {
                        url: '/Dashboard/get-chart-area-data',
                        type: 'POST',
                        data: {
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                month: val,
                                type: $('#cbType').val()
                            },
                        success: function(resp)
                        {
                            var indexes = [];
                            var values = [];
                            var data = [];
                            if(resp['total'][0].totalStudent != null && resp['total'][0].totalStudent != "")
                                $("#total").text("Total: " + resp['total'][0].totalStudent + " Students");
                            else
                                 $("#total").text("Total: 0 Student");

                             if(resp['totalUmn'][0].totalStudent != null && resp['totalUmn'][0].totalStudent != "")
                                $("#total-university").text("Total UMN: " + resp['totalUmn'][0].totalStudent + " Students");
                            else
                                 $("#total-university").text("Total UMN: 0 Student");

                            if($.isArray(resp['data']))
                            {
                                if(resp['data'].length != 0)
                                {
                                    $.each(resp['data'], function(idx, el)
                                    {
                                        var currentDate = moment(new Date(el.register_date)).format('YYYY-MM-DD');
        
                                        if(dateArray.indexOf(currentDate) != -1){
                                            indexes.push(dateArray.indexOf(currentDate));
                                            values.push(el.totalStudent);
                                        }
                                    });
        
                                    for(var i = 0; i < dateArray.length; i++)
                                    {
                                        data.push(0);                            
                                    }
        
                                    for(var i = 0; i < indexes.length; i++)
                                    {
                                        data[indexes[i]] = parseInt(values[i]);
                                    };
                                }
                                else
                                {
                                    for(var i = 0; i < dateArray.length; i++)
                                    {
                                        data.push(0);                            
                                    }
                                }
        
                                require(
                                    [
                                        'echarts',
                                        'echarts/theme/limitless',
                                        'echarts/chart/bar',
                                        'echarts/chart/line'
                                    ],
        
                                    function(ec, limitless)
                                    {
                                        var basic_area = ec.init(document.getElementById('basic_area'), limitless);
        
                                        basic_area_options = {
        
                                            // Setup grid
                                            grid: {
                                                x: 40,
                                                x2: 20,
                                                y: 35,
                                                y2: 25
                                            },
        
                                            // Add tooltip
                                            tooltip: {
                                                trigger: 'axis'
                                            },
        
                                            // Add legend
                                            legend: {
                                                data: ['Student']
                                            },
        
        
                                            // Enable drag recalculate
                                            calculable: true,
        
                                            // Horizontal axis
                                            xAxis: [{
                                                type: 'category',
                                                boundaryGap: false,
                                                data: dateArray
                                            }],
        
                                            // Vertical axis
                                            yAxis: [{
                                                type: 'value'
                                            }],
        
                                            // Add series
                                            series: [
                                                {
                                                    name: 'Total Student',
                                                    type: 'line',
                                                    smooth: true,
                                                    itemStyle: {normal: {areaStyle: {type: 'default'}}},
                                                    data: data
                                                }
                                            ]
                                        };
        
                                        basic_area.setOption(basic_area_options);
                                        window.onresize = function () {
                                            setTimeout(function () {
                                                basic_area.resize();
                                            }, 200);
                                        }
                                    }
                                );

                                $('.loader-container').fadeOut('slow');
                                $('.page-container').removeClass('blur');
                            }
                            else
                            {
                                $('.loader-container').fadeOut('slow');
                                $('.page-container').removeClass('blur');
                                alert("There's no data");
                            }
                        },
                        error: function(textStatus)
                        {
                            $('.loader-container').fadeOut('slow');
                            $('.page-container').removeClass('blur');
                            alert('Whoops something happen');
                            location.reload();
                        }
                    });
                }
                else
                {
                    $.ajax(
                    {
                        url: '/Dashboard/get-chart-area-data',
                        type: 'POST',
                        data: {
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                month: val,
                                type: $('#cbType').val()
                            },
                        success: function(resp)
                        {
                            var indexes = [];
                            var values = [];
                            var data = [];

                            if(resp['total'][0].totalJobPost != null && resp['total'][0].totalJobPost != "")
                                $("#total").text("Total: " + resp['total'][0].totalJobPost + " Job Post");
                            else
                                 $("#total").text("Total: 0 Job Post");
                            if($.isArray(resp['data']))
                            {
                                if(resp['data'].length != 0)
                                {
                                    $.each(resp['data'], function(idx, el)
                                    {
                                        var currentDate = moment(new Date(el.created_at)).format('YYYY-MM-DD');
        
                                        if(dateArray.indexOf(currentDate) != -1){
                                            indexes.push(dateArray.indexOf(currentDate));
                                            values.push(el.totalJobPost);
                                        }
                                    });
        
                                    for(var i = 0; i < dateArray.length; i++)
                                    {
                                        data.push(0);                            
                                    }
        
                                    for(var i = 0; i < indexes.length; i++)
                                    {
                                        data[indexes[i]] = parseInt(values[i]);
                                    };
                                }
                                else
                                {
                                    for(var i = 0; i < dateArray.length; i++)
                                    {
                                        data.push(0);                            
                                    }
                                }
        
                                require(
                                    [
                                        'echarts',
                                        'echarts/theme/limitless',
                                        'echarts/chart/bar',
                                        'echarts/chart/line'
                                    ],
        
                                    function(ec, limitless)
                                    {
                                        var basic_area = ec.init(document.getElementById('basic_area'), limitless);
        
                                        basic_area_options = {
        
                                            // Setup grid
                                            grid: {
                                                x: 40,
                                                x2: 20,
                                                y: 35,
                                                y2: 25
                                            },
        
                                            // Add tooltip
                                            tooltip: {
                                                trigger: 'axis'
                                            },
        
                                            // Add legend
                                            legend: {
                                                data: ['Company']
                                            },
        
        
                                            // Enable drag recalculate
                                            calculable: true,
        
                                            // Horizontal axis
                                            xAxis: [{
                                                type: 'category',
                                                boundaryGap: false,
                                                data: dateArray
                                            }],
        
                                            // Vertical axis
                                            yAxis: [{
                                                type: 'value'
                                            }],
        
                                            // Add series
                                            series: [
                                                {
                                                    name: 'Total Company',
                                                    type: 'line',
                                                    smooth: true,
                                                    itemStyle: {normal: {areaStyle: {type: 'default'}}},
                                                    data: data
                                                }
                                            ]
                                        };
        
                                        basic_area.setOption(basic_area_options);
                                        window.onresize = function () {
                                            setTimeout(function () {
                                                basic_area.resize();
                                            }, 200);
                                        }
                                    }
                                );

                                $('.loader-container').fadeOut('slow');
                                $('.page-container').removeClass('blur');
                            }
                            else
                            {
                                $('.loader-container').fadeOut('slow');
                                $('.page-container').removeClass('blur');
                                alert("There's no data");
                            }
                        },
                        error: function(textStatus)
                        {
                            $('.loader-container').fadeOut('slow');
                            $('.page-container').removeClass('blur');
                            alert('Whoops something happen');
                            location.reload();
                        }
                    });
                }
            });

            // $('.daterange-left').daterangepicker({
            //     opens: 'left',
            //     startDate: moment().subtract(6, 'days'),
            //     endDate: moment(),
            //     dateLimit: { days: 30 },
            //     showDropdowns: true,
            //     ranges: {
            //         'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            //         'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            //         'Weekly': [moment().startOf('month'), moment().endOf('month')],
            //         'Monthly': [moment().startOf('year'), moment().endOf('year')]
            //     }
            // }, function(start, end, label)
            // {
            //     var dateArray = [];
            //     start = new Date(start);
            //     end = new Date(end);

            //     var graph = $("#cbType").val();

            //     var startDate = moment(start).format('YYYY-MM-DD');
            //     var endDate = moment(end).add(1, 'days').format('YYYY-MM-DD');
            //     if(graph == "cbCompany")
            //     {
            //         switch(label)
            //         {
            //             case 'Weekly':
            //                 dateArray = [1, 2, 3, 4];
            //                 $.ajax(
            //                 {
            //                     url: '/Dashboard/get-chart-bar-data',
            //                     type: 'POST',
            //                     data: {_token: "<?php echo csrf_token(); ?>",
            //                             startDate: startDate,
            //                             endDate: endDate,
            //                             type: 'weekly',
            //                             graph: graph},
            //                     success: function(resp)
            //                     {
                                    // console.log(resp);
                                    // var indexes = [];
                                    // var values = [];
                                    // var data = [];

                                    // if($.isArray(resp['data']))
                                    // {
                                    //     if(resp['data'].length != 0)
                                    //     {
                                    //         $.each(resp, (idx, el) => {
                                    //             if(dateArray.indexOf(el.week) != -1){
                                    //                 indexes.push(dateArray.indexOf(el.week));
                                    //                 values.push(el.totalCompany);
                                    //             }
                                    //         });

                                    //         for(var i = 0; i < dateArray.length; i++)
                                    //         {
                                    //             data.push(0);                            
                                    //         }

                                    //         for(var i = 0; i < indexes.length; i++)
                                    //         {
                                    //             data[indexes[i]] = parseInt(values[i]);
                                    //         };
                                    //     }
                                    //     else
                                    //     {
                                    //         for(var i = 0; i < dateArray.length; i++)
                                    //         {
                                    //             data.push(0);                            
                                    //         }
                                    //     }

                                    //     require(
                                    //         [
                                    //             'echarts',
                                    //             'echarts/theme/limitless',
                                    //             'echarts/chart/bar',
                                    //             'echarts/chart/line'
                                    //         ],

                                    //         function(ec, limitless)
                                    //         {
                                    //             var change_waterfall = ec.init(document.getElementById('change_waterfall'), limitless);

                                    //             change_waterfall_options = {

                                    //                 // Setup grid
                                    //                 grid: {
                                    //                     x: 45,
                                    //                     x2: 10,
                                    //                     y: 35,
                                    //                     y2: 25
                                    //                 },

                                    //                 // Add tooltip
                                    //                 tooltip: {
                                    //                     trigger: 'axis',
                                    //                     axisPointer: {
                                    //                         type: 'shadow'
                                    //                     },
                                    //                     formatter: function (params) {
                                    //                         return params[0].name;
                                    //                     }
                                    //                 },

                                    //                 // Add legend
                                    //                 legend: 
                                    //                 {
                                    //                     data: ['Total Company']
                                    //                 },

                                    //                 // Horizontal axis
                                    //                 xAxis: [{
                                    //                     type: 'category',
                                    //                     data: dateArray
                                    //                 }],

                                    //                 // Vertical axis
                                    //                 yAxis: [{
                                    //                     type: 'value'
                                    //                 }],

                                    //                 // Add series
                                    //                 series: 
                                    //                 [
                                    //                     {
                                    //                         name: 'Total Company',
                                    //                         type: 'bar',
                                    //                         stack: 'Total',
                                    //                         itemStyle: { normal: {label: {show: true, position: 'top'}}},
                                    //                         data: data
                                    //                     }
                                    //                 ]
                                    //             };

                                    //             change_waterfall.setOption(change_waterfall_options);
                                    //             window.onresize = function () {
                                    //                 setTimeout(function () {
                                    //                     change_waterfall.resize();
                                    //                 }, 200);
                                    //             }
                                    //         }
                                    //     )
                                    // }
                                    // else
                                    // {
                                    //     alert("There's no data");
                                    // }
            //                     }
            //                 });
            //                 break;
            //             case 'Monthly':
            //                 dateArray = [1,2,3,4,5,6,7,8,9,10,11,12];
            //                 $.ajax(
            //                 {
            //                     url: '/Dashboard/get-chart-bar-data',
            //                     type: 'POST',
            //                     data: {_token: "<?php echo csrf_token(); ?>",
            //                             startDate: startDate,
            //                             endDate: endDate,
            //                             type: 'monthly',
            //                             graph: graph},
            //                     success: function(resp)
            //                     {
            //                         var indexes = [];
            //                         var values = [];
            //                         var data = [];

            //                         if($.isArray(resp['data']))
            //                         {
            //                             if(resp['data'].length != 0)
            //                             {
            //                                 $.each(resp, (idx, el) => {
            //                                     if(dateArray.indexOf(el.month) != -1){
            //                                         indexes.push(dateArray.indexOf(el.month));
            //                                         values.push(el.totalCompany);
            //                                     }
            //                                 });

            //                                 for(var i = 0; i < dateArray.length; i++)
            //                                 {
            //                                     data.push(0);                            
            //                                 }

            //                                 for(var i = 0; i < indexes.length; i++)
            //                                 {
            //                                     data[indexes[i]] = parseInt(values[i]);
            //                                 };
            //                             }
            //                             else
            //                             {
            //                                 for(var i = 0; i < dateArray.length; i++)
            //                                 {
            //                                     data.push(0);                            
            //                                 }
            //                             }

            //                             require(
            //                                 [
            //                                     'echarts',
            //                                     'echarts/theme/limitless',
            //                                     'echarts/chart/bar',
            //                                     'echarts/chart/line'
            //                                 ],

            //                                 function(ec, limitless)
            //                                 {
            //                                     var change_waterfall = ec.init(document.getElementById('change_waterfall'), limitless);

            //                                     change_waterfall_options = {

            //                                         // Setup grid
            //                                         grid: {
            //                                             x: 45,
            //                                             x2: 10,
            //                                             y: 35,
            //                                             y2: 25
            //                                         },

            //                                         // Add tooltip
            //                                         tooltip: {
            //                                             trigger: 'axis',
            //                                             axisPointer: {
            //                                                 type: 'shadow'
            //                                             },
            //                                             formatter: function (params) {
            //                                                 return params[0].name;
            //                                             }
            //                                         },

            //                                         // Add legend
            //                                         legend: 
            //                                         {
            //                                             data: ['Total Company']
            //                                         },

            //                                         // Horizontal axis
            //                                         xAxis: [{
            //                                             type: 'category',
            //                                             data: dateArray
            //                                         }],

            //                                         // Vertical axis
            //                                         yAxis: [{
            //                                             type: 'value'
            //                                         }],

            //                                         // Add series
            //                                         series: 
            //                                         [
            //                                             {
            //                                                 name: 'Total Company',
            //                                                 type: 'bar',
            //                                                 stack: 'Total',
            //                                                 itemStyle: { normal: {label: {show: true, position: 'top'}}},
            //                                                 data: data
            //                                             }
            //                                         ]
            //                                     };

            //                                     change_waterfall.setOption(change_waterfall_options);
            //                                     window.onresize = function () {
            //                                         setTimeout(function () {
            //                                             change_waterfall.resize();
            //                                         }, 200);
            //                                     }
            //                                 }
            //                             )
            //                         }
            //                         else
            //                         {
            //                             alert("There's no data");
            //                         }
            //                     }
            //                 });
            //                 break;
            //             default:
            //                 for(var d = start; d <= end; d.setDate(d.getDate() + 1))
            //                 {
            //                     dateArray.push(moment(new Date(d)).format('YYYY-MM-DD'));
            //                 }
            //                 $.ajax({
            //                     url: '/Dashboard/get-chart-bar-data',
            //                     type: 'POST',
            //                     data: {_token: "<?php echo csrf_token(); ?>",
            //                             startDate: startDate,
            //                             endDate: endDate,
            //                             type: 'all',
            //                             graph: graph},
            //                     success: function(resp)
            //                     {
            //                         var indexes = [];
            //                         var values = [];
            //                         var data = [];
            //                         $.each(resp, function(idx, el)
            //                         {
            //                             var currentDate = moment(new Date(el.created_at)).format('YYYY-MM-DD');

            //                             if(dateArray.indexOf(currentDate) != -1){
            //                                 indexes.push(dateArray.indexOf(currentDate));
            //                                 values.push(el.totalCompany);
            //                             }
            //                         });

            //                         for(var i = 0; i < dateArray.length; i++)
            //                         {
            //                             data.push(0);                            
            //                         }

            //                         for(var i = 0; i < indexes.length; i++)
            //                         {
            //                             data[indexes[i]] = parseInt(values[i]);
            //                         };

            //                         require(
            //                             [
            //                                 'echarts',
            //                                 'echarts/theme/limitless',
            //                                 'echarts/chart/bar',
            //                                 'echarts/chart/line'
            //                             ],

            //                             function(ec, limitless)
            //                             {
            //                                 var change_waterfall = ec.init(document.getElementById('change_waterfall'), limitless);

            //                                 change_waterfall_options = {

            //                                     // Setup grid
            //                                     grid: {
            //                                         x: 45,
            //                                         x2: 10,
            //                                         y: 35,
            //                                         y2: 25
            //                                     },

            //                                     // Add tooltip
            //                                     tooltip: {
            //                                         trigger: 'axis',
            //                                         axisPointer: {
            //                                             type: 'shadow'
            //                                         },
            //                                         formatter: function (params) {
            //                                             return params[0].name;
            //                                         }
            //                                     },

            //                                     // Add legend
            //                                     legend: 
            //                                     {
            //                                         data: ['Total Company']
            //                                     },

            //                                     // Horizontal axis
            //                                     xAxis: [{
            //                                         type: 'category',
            //                                         data: dateArray
            //                                     }],

            //                                     // Vertical axis
            //                                     yAxis: [{
            //                                         type: 'value'
            //                                     }],

            //                                     // Add series
            //                                     series: 
            //                                     [
            //                                         {
            //                                             name: 'Total Company',
            //                                             type: 'bar',
            //                                             stack: 'Total',
            //                                             itemStyle: { normal: {label: {show: true, position: 'top'}}},
            //                                             data: data
            //                                         }
            //                                     ]
            //                                 };

            //                                 change_waterfall.setOption(change_waterfall_options);
            //                                 window.onresize = function () {
            //                                     setTimeout(function () {
            //                                         change_waterfall.resize();
            //                                     }, 200);
            //                                 }
            //                             }
            //                         )
            //                     },
            //                     error :function(resp)
            //                     {
            //                         alert('Failed');
            //                     }
            //                 });
            //                 break;
            //         }
            //     }
            //     else
            //     {
            //         switch(label)
            //         {
            //             case 'Weekly':
            //                 dateArray = [1, 2, 3, 4];
            //                 $.ajax(
            //                 {
            //                     url: '/Dashboard/get-chart-bar-data',
            //                     type: 'POST',
            //                     data: {_token: "<?php echo csrf_token(); ?>",
            //                             startDate: startDate,
            //                             endDate: endDate,
            //                             type: 'weekly',
            //                             graph: graph},
            //                     success: function(resp)
            //                     {
            //                         var indexes = [];
            //                         var values = [];
            //                         var data = [];

            //                         if($.isArray(resp['data']))
            //                         {
            //                             if(resp['data'].length != 0)
            //                             {
            //                                 $.each(resp, (idx, el) => {
            //                                     if(dateArray.indexOf(el.week) != -1){
            //                                         indexes.push(dateArray.indexOf(el.week));
            //                                         values.push(el.totalJobPost);
            //                                     }
            //                                 });

            //                                 for(var i = 0; i < dateArray.length; i++)
            //                                 {
            //                                     data.push(0);                            
            //                                 }

            //                                 for(var i = 0; i < indexes.length; i++)
            //                                 {
            //                                     data[indexes[i]] = parseInt(values[i]);
            //                                 };
            //                             }
            //                             else
            //                             {
            //                                 for(var i = 0; i < dateArray.length; i++)
            //                                 {
            //                                     data.push(0);                            
            //                                 }
            //                             }

            //                             require(
            //                                 [
            //                                     'echarts',
            //                                     'echarts/theme/limitless',
            //                                     'echarts/chart/bar',
            //                                     'echarts/chart/line'
            //                                 ],

            //                                 function(ec, limitless)
            //                                 {
            //                                     var change_waterfall = ec.init(document.getElementById('change_waterfall'), limitless);

            //                                     change_waterfall_options = {

            //                                         // Setup grid
            //                                         grid: {
            //                                             x: 45,
            //                                             x2: 10,
            //                                             y: 35,
            //                                             y2: 25
            //                                         },

            //                                         // Add tooltip
            //                                         tooltip: {
            //                                             trigger: 'axis',
            //                                             axisPointer: {
            //                                                 type: 'shadow'
            //                                             },
            //                                             formatter: function (params) {
            //                                                 return params[0].name;
            //                                             }
            //                                         },

            //                                         // Add legend
            //                                         legend: 
            //                                         {
            //                                             data: ['Total Job Post']
            //                                         },

            //                                         // Horizontal axis
            //                                         xAxis: [{
            //                                             type: 'category',
            //                                             data: dateArray
            //                                         }],

            //                                         // Vertical axis
            //                                         yAxis: [{
            //                                             type: 'value'
            //                                         }],

            //                                         // Add series
            //                                         series: 
            //                                         [
            //                                             {
            //                                                 name: 'Total Job Post',
            //                                                 type: 'bar',
            //                                                 stack: 'Total',
            //                                                 itemStyle: { normal: {label: {show: true, position: 'top'}}},
            //                                                 data: data
            //                                             }
            //                                         ]
            //                                     };

            //                                     change_waterfall.setOption(change_waterfall_options);
            //                                     window.onresize = function () {
            //                                         setTimeout(function () {
            //                                             change_waterfall.resize();
            //                                         }, 200);
            //                                     }
            //                                 }
            //                             )
            //                         }
            //                         else
            //                         {
            //                             alert("There's no data");
            //                         }
            //                     }
            //                 });
            //                 break;
            //             case 'Monthly':
            //                 dateArray = [1,2,3,4,5,6,7,8,9,10,11,12];
            //                 $.ajax(
            //                 {
            //                     url: '/Dashboard/get-chart-bar-data',
            //                     type: 'POST',
            //                     data: {_token: "<?php echo csrf_token(); ?>",
            //                             startDate: startDate,
            //                             endDate: endDate,
            //                             type: 'monthly',
            //                             graph: graph},
            //                     success: function(resp)
            //                     {
            //                         var indexes = [];
            //                         var values = [];
            //                         var data = [];

            //                         if($.isArray(resp['data']))
            //                         {
            //                             if(resp['data'].length != 0)
            //                             {
            //                                 $.each(resp, (idx, el) => {
            //                                     if(dateArray.indexOf(el.month) != -1){
            //                                         indexes.push(dateArray.indexOf(el.month));
            //                                         values.push(el.totalJobPost);
            //                                     }
            //                                 });

            //                                 for(var i = 0; i < dateArray.length; i++)
            //                                 {
            //                                     data.push(0);                            
            //                                 }

            //                                 for(var i = 0; i < indexes.length; i++)
            //                                 {
            //                                     data[indexes[i]] = parseInt(values[i]);
            //                                 };
            //                             }
            //                             else
            //                             {
            //                                 for(var i = 0; i < dateArray.length; i++)
            //                                 {
            //                                     data.push(0);                            
            //                                 }
            //                             }

            //                             require(
            //                                 [
            //                                     'echarts',
            //                                     'echarts/theme/limitless',
            //                                     'echarts/chart/bar',
            //                                     'echarts/chart/line'
            //                                 ],

            //                                 function(ec, limitless)
            //                                 {
            //                                     var change_waterfall = ec.init(document.getElementById('change_waterfall'), limitless);

            //                                     change_waterfall_options = {

            //                                         // Setup grid
            //                                         grid: {
            //                                             x: 45,
            //                                             x2: 10,
            //                                             y: 35,
            //                                             y2: 25
            //                                         },

            //                                         // Add tooltip
            //                                         tooltip: {
            //                                             trigger: 'axis',
            //                                             axisPointer: {
            //                                                 type: 'shadow'
            //                                             },
            //                                             formatter: function (params) {
            //                                                 return params[0].name;
            //                                             }
            //                                         },

            //                                         // Add legend
            //                                         legend: 
            //                                         {
            //                                             data: ['Total Job Post']
            //                                         },

            //                                         // Horizontal axis
            //                                         xAxis: [{
            //                                             type: 'category',
            //                                             data: dateArray
            //                                         }],

            //                                         // Vertical axis
            //                                         yAxis: [{
            //                                             type: 'value'
            //                                         }],

            //                                         // Add series
            //                                         series: 
            //                                         [
            //                                             {
            //                                                 name: 'Total Job Post',
            //                                                 type: 'bar',
            //                                                 stack: 'Total',
            //                                                 itemStyle: { normal: {label: {show: true, position: 'top'}}},
            //                                                 data: data
            //                                             }
            //                                         ]
            //                                     };

            //                                     change_waterfall.setOption(change_waterfall_options);
            //                                     window.onresize = function () {
            //                                         setTimeout(function () {
            //                                             change_waterfall.resize();
            //                                         }, 200);
            //                                     }
            //                                 }
            //                             )
            //                         }
            //                         else
            //                         {
            //                             alert("There's no data");
            //                         }
            //                     }
            //                 });
            //                 break;
            //             default:
            //                 for(var d = start; d <= end; d.setDate(d.getDate() + 1))
            //                 {
            //                     dateArray.push(moment(new Date(d)).format('YYYY-MM-DD'));
            //                 }
            //                 $.ajax({
            //                     url: '/Dashboard/get-chart-bar-data',
            //                     type: 'POST',
            //                     data: {_token: "<?php echo csrf_token(); ?>",
            //                             startDate: startDate,
            //                             endDate: endDate,
            //                             type: 'all',
            //                             graph: graph},
            //                     success: function(resp)
            //                     {
            //                         var indexes = [];
            //                         var values = [];
            //                         var data = [];
            //                         $.each(resp, function(idx, el)
            //                         {
            //                             var currentDate = moment(new Date(el.created_at)).format('YYYY-MM-DD');

            //                             if(dateArray.indexOf(currentDate) != -1){
            //                                 indexes.push(dateArray.indexOf(currentDate));
            //                                 values.push(el.totalJobPost);
            //                             }
            //                         });

            //                         for(var i = 0; i < dateArray.length; i++)
            //                         {
            //                             data.push(0);                            
            //                         }

            //                         for(var i = 0; i < indexes.length; i++)
            //                         {
            //                             data[indexes[i]] = parseInt(values[i]);
            //                         };

            //                         require(
            //                             [
            //                                 'echarts',
            //                                 'echarts/theme/limitless',
            //                                 'echarts/chart/bar',
            //                                 'echarts/chart/line'
            //                             ],

            //                             function(ec, limitless)
            //                             {
            //                                 var change_waterfall = ec.init(document.getElementById('change_waterfall'), limitless);

            //                                 change_waterfall_options = {

            //                                     // Setup grid
            //                                     grid: {
            //                                         x: 45,
            //                                         x2: 10,
            //                                         y: 35,
            //                                         y2: 25
            //                                     },

            //                                     // Add tooltip
            //                                     tooltip: {
            //                                         trigger: 'axis',
            //                                         axisPointer: {
            //                                             type: 'shadow'
            //                                         },
            //                                         formatter: function (params) {
            //                                             return params[0].name;
            //                                         }
            //                                     },

            //                                     // Add legend
            //                                     legend: 
            //                                     {
            //                                         data: ['Total Job Post']
            //                                     },

            //                                     // Horizontal axis
            //                                     xAxis: [{
            //                                         type: 'category',
            //                                         data: dateArray
            //                                     }],

            //                                     // Vertical axis
            //                                     yAxis: [{
            //                                         type: 'value'
            //                                     }],

            //                                     // Add series
            //                                     series: 
            //                                     [
            //                                         {
            //                                             name: 'Total Job Post',
            //                                             type: 'bar',
            //                                             stack: 'Total',
            //                                             itemStyle: { normal: {label: {show: true, position: 'top'}}},
            //                                             data: data
            //                                         }
            //                                     ]
            //                                 };

            //                                 change_waterfall.setOption(change_waterfall_options);
            //                                 window.onresize = function () {
            //                                     setTimeout(function () {
            //                                         change_waterfall.resize();
            //                                     }, 200);
            //                                 }
            //                             }
            //                         )
            //                     },
            //                     error :function(resp)
            //                     {
            //                         alert('Failed');
            //                     }
            //                 });
            //                 break;
            //         }
            //     }
            // });
            
            // /* Initialize graph for the first time */
            // var current = $(".daterange-left").val();
            // var dates = $(".daterange-left").val().split("-");

            // var startDate = new Date(dates[0]);
            // var endDate   = new Date(dates[1]);

            // var startDate_2 = moment(startDate).format('YYYY-MM-DD');
            // var endDate_2 = moment(endDate).add(1, 'days').format('YYYY-MM-DD');

            // var dateArray = [];
            // for(var d = startDate; d <= endDate; d.setDate(d.getDate() + 1))
            // {
            //     dateArray.push(moment(new Date(d)).format('YYYY-MM-DD'));
            // }
            // var graph = $("#cbType").val();
            // $.ajax(
            // {
            //     url: '/Dashboard/get-chart-bar-data',
            //     type: 'POST',
            //     data: {_token: "<?php echo csrf_token(); ?>",
            //             startDate: startDate_2,
            //             endDate: endDate_2,
            //             type: 'all',
            //             graph: graph},
            //     success: function(resp)
            //     {
            //         console.log(resp);
            //         var indexes = [];
            //         var values = [];
            //         var data = [];
                    // $.each(resp, function(idx, el)
                    // {
                    //     var currentDate = moment(new Date(el.created_at)).format('YYYY-MM-DD');

                    //     if(dateArray.indexOf(currentDate) != -1){
                    //         indexes.push(dateArray.indexOf(currentDate));
                    //         values.push(el.totalCompany);
                    //     }
                    // });

                    // for(var i = 0; i < dateArray.length; i++)
                    // {
                    //     data.push(0);                            
                    // }

                    // for(var i = 0; i < indexes.length; i++)
                    // {
                    //     data[indexes[i]] = parseInt(values[i]);
                    // };

            //         require(
            //             [
            //                 'echarts',
            //                 'echarts/theme/limitless',
            //                 'echarts/chart/bar',
            //                 'echarts/chart/line'
            //             ],

            //             function(ec, limitless)
            //             {
            //                 var change_waterfall = ec.init(document.getElementById('change_waterfall'), limitless);

            //                 change_waterfall_options = {

            //                     // Setup grid
            //                     grid: {
            //                         x: 45,
            //                         x2: 10,
            //                         y: 35,
            //                         y2: 25
            //                     },

            //                     // Add tooltip
            //                     tooltip: {
            //                         trigger: 'axis',
            //                         axisPointer: {
            //                             type: 'shadow'
            //                         },
            //                         formatter: function (params) {
            //                             return params[0].name;
            //                         }
            //                     },

            //                     // Add legend
            //                     legend: 
            //                     {
            //                         data: ['Total Company']
            //                     },

            //                     // Horizontal axis
            //                     xAxis: [{
            //                         type: 'category',
            //                         data: dateArray
            //                     }],

            //                     // Vertical axis
            //                     yAxis: [{
            //                         type: 'value'
            //                     }],

            //                     // Add series
            //                     series: 
            //                     [
            //                         {
            //                             name: 'Total Company',
            //                             type: 'bar',
            //                             stack: 'Total',
            //                             itemStyle: { normal: {label: {show: true, position: 'top'}}},
            //                             data: data
            //                         }
            //                     ]
            //                 };

            //                 change_waterfall.setOption(change_waterfall_options);
            //                 window.onresize = function () {
            //                     setTimeout(function () {
            //                         change_waterfall.resize();
            //                     }, 200);
            //                 }
            //             }
            //         )
            //     },
            //     error :function(resp)
            //     {
            //         alert('Failed');
            //     }
            // });
            // /* End of Initialize */

            // /* 
            //     * Pagination 
            // */
            // var idxYear = $("#ulMonth").find('li.active').find('a').data('id');

            // if(idxYear == 1)
            //     $("#ulMonth a.previous").addClass('disabled');

            // $("#ulMonth a.previous").on('click', function(e)
            // {
            //     if($(this).hasClass('disabled'))
            //         //do nothing
            //     else
            //     {

            //     }
        
            // });
        });