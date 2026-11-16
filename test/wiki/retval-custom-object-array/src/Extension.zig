const std = @import("std");

const php = @import("php/root.zig");

const Point = struct {
    pub const @"use auto getters" = true;
    pub const @"use auto setters" = true;

    x: f64,
    y: f64,
};

pub const @"export Point" = php.Class.Custom(Point);

pub fn @"call create_multiple"(_: *@This(), allocator: std.mem.Allocator, args: struct {
    count: usize,
}) ![]Point {
    const list = try allocator.alloc(Point, args.count);
    for (list, 0..) |*ptr, i| ptr.* = .{
        .x = @floatFromInt(i),
        .y = @floatFromInt(i),
    };
    return list;
}
